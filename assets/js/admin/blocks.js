var el = wp.element.createElement,
  registerBlockType = wp.blocks.registerBlockType,
  ServerSideRender = wp.serverSideRender,
  TextControl = wp.components.TextControl,
  TextareaControl = wp.components.TextareaControl,
  SelectControl = wp.components.SelectControl,
  CheckboxControl = wp.components.CheckboxControl,
  ToggleControl = wp.components.ToggleControl,
  Button = wp.components.Button,
  PanelBody = wp.components.PanelBody,
  ColorPicker = wp.components.ColorPicker,
  withSelect = wp.data.withSelect,
  MediaUpload = wp.blockEditor.MediaUpload,
  InnerBlocks = wp.editor.InnerBlocks,
  RichText = wp.blockEditor.RichText,
  InspectorControls = wp.blockEditor.InspectorControls;
//wp.core.freeform
const prefix = 'understrap-dfrost/';
Object.keys(dfrost_blocks).forEach((name) => {
  if (name == 'quote-block') {
    registerBlockType( prefix + name, {
        title: dfrost_blocks[name].title,
        icon: dfrost_blocks[name].icon,
        category: dfrost_blocks[name].category,
        edit: function( props ) {
            return el('section', { className: 'citation' },
              el(
                'div',
                {
                  className: 'container',
                },
                el(InnerBlocks)
              )
            );
        },
        save: function( props ) {
            return el('section', { className: 'citation' },
              el(
                'div',
                {
                  className: 'container',
                },
                el(InnerBlocks.Content)
              )
            );
        },
    } );
    // RichEdit example. Not Use now
  } else if (name != name) {
    registerBlockType( prefix + name, {
      title: dfrost_blocks[name].title,
      icon: dfrost_blocks[name].icon,
      category: dfrost_blocks[name].category,
      attributes: {
        quote: {
          type: 'string',
        }
      },
      edit: function( props ) {
        return el(RichText, {
          value: props.attributes.quote,
          placeholder: dfrost_blocks[name].attributes.quote.label,
          onChange: (value) => {
              props.setAttributes({ quote: value });
          }
        });
      },
      save: function( props ) {
            return null;
      },
    });
  } else {
    const regAttrs = {};
    Object.keys(dfrost_blocks[name].attributes).forEach((key) => {
      regAttrs[key] = { type: dfrost_blocks[name].attributes[key].type, default: dfrost_blocks[name].attributes[key].default };
    });
    registerBlockType(prefix + name, {
      title: dfrost_blocks[name].title,
      icon: dfrost_blocks[name].icon,
      category: dfrost_blocks[name].category,
      attributes: regAttrs,
      edit: withSelect( function( select ) {
      if (dfrost_blocks[name].post_type == 'wpcf7_contact_form') {
        return {
          posts: dfrost_forms
        };
      } else if (dfrost_blocks[name].post_type) {
        return {
          posts: select( 'core' ).getEntityRecords( 'postType', dfrost_blocks[name].post_type )
        };
      } else if (dfrost_blocks[name].category_type) {
        return {
          posts: select( 'core' ).getEntityRecords( 'taxonomy', dfrost_blocks[name].category_type, { per_page: 100 } )
        };
      } else {
        return {
          posts: []
        };
      }
      } )(function (props) {
      const result = [
        el(ServerSideRender, {
          block: prefix + name,
          attributes: props.attributes,
        }),
      ];
      const attrs = dfrost_blocks[name].attributes;
      Object.keys(attrs).forEach((index) => {
        var control;
        if (index == 'className') {
            return;
        }
        if (attrs[index].inputType == 'hidden') {
          return;
        }
        if (attrs[index].type == 'boolean') {
            control = el(ToggleControl, {
                label: attrs[index].label,
                checked: props.attributes[index],
                onChange: (value) => {
                    props.setAttributes({ [index]: value });
                },
            });
        } else if (attrs[index].inputType == 'media') {
          const mediaUploader = el(MediaUpload, {
            label: attrs[index].label,
            allowedTypes: [attrs[index].mediaType],
            onSelect: (media) => {
              props.setAttributes({
                [index]: media.id,
                mediaUrl: media.url
              });
            },
            render: (obj) => {
              return el( Button, {
                    className: 'components-icon-button image-block-btn is-button is-default is-large',
                    onClick: obj.open
                },
                el( 'svg', { className: 'dashicon dashicons-edit', width: '20', height: '20' },
                  el( 'path', { d: "M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z" } )
                ),
                el( 'span', {},
                    'Select background ' + attrs[index].mediaType
                ),
              );
            }
          });
          let mediaEl;
          if (attrs[index].mediaType == 'video') {
            mediaEl = el('video', {
              className: 'wp-video-shortcode',
              preload: 'metadata',
              controls: 'controls',
              src: props.attributes.mediaUrl
            });
          } else {
            mediaEl = el('figure',
              {className: 'wp-block-image'},
              el('img', {src: props.attributes.mediaUrl})
            );
          }
          control = el(PanelBody, {
              title: attrs[index].label
            },
            el('div', {},
              mediaEl
            ),
            mediaUploader,
            el(
              Button,
              {
                onClick: () => {
                  props.setAttributes({
                    [index]: 0,
                    mediaUrl: ''
                  });
                },
                className: 'components-button is-link is-destructive'
              },
              'Remove'
            )
          );
        } else if (attrs[index].source == 'posts') {
            var postsValue = [];
            if (attrs[index].type == 'number') {
                if (props.posts) {
                  postsValue = props.posts.map( ({ id, name }) => ( { value: parseInt(id, 10), label:name}) );
                }
                postsValue.unshift({value: 0, label: 'No'});
                control = el(SelectControl, {
                    label: attrs[index].label,
                    value: parseInt(props.attributes[index], 10),
                    options: postsValue,
                    onChange: (value) => { props.setAttributes({ [index]: parseInt(value, 10) }); },
                });
            } else {
                if (props.posts) {
                    postsValue = props.posts.map( ({ slug, name }) => ( { value: slug, label:name}) );
                }
                postsValue.unshift({value: '', label: 'No'});
                control = el(SelectControl, {
                    label: attrs[index].label,
                    value: props.attributes[index],
                    options: postsValue,
                    onChange: (value) => { props.setAttributes({ [index]: value }); },
                });
            }
        } else if (attrs[index].source == 'shortcode') {
            control = el(SelectControl, {
                label: attrs[index].label,
                value: props.attributes[index],
                options: attrs[index].values.map(val => ({value: val, label:val})),
                onChange: (value) => { props.setAttributes({ [index]: value }); },
            });
        } else if (attrs[index].inputType == 'color') {
            const picker = el(ColorPicker, {
                label: attrs[index].label,
                color: props.attributes[index],
                onChangeComplete: (value) => {
                  props.attributes[index] = value;
                },
            });
            control = el(PanelBody, {
              title: attrs[index].label
            },
            picker
            );
        } else if (attrs[index].inputType == 'textarea') {
            control = el(TextareaControl, {
                label: attrs[index].label,
                value: props.attributes[index],
                onChange: (value) => { props.setAttributes({ [index]: value }); },
            });
        } else if (attrs[index].type == 'number') {
          control = el(TextControl, {
            label: attrs[index].label,
            type: 'number',
            value: parseInt(props.attributes[index], 10),
            onChange: (value) => { props.setAttributes({ [index]: parseInt(value, 10) }); },
          });
        } else {
          control = el(TextControl, {
            label: attrs[index].label,
            value: props.attributes[index],
            onChange: (value) => { props.setAttributes({ [index]: value }); },
          });
        }
        result.push(el(InspectorControls, {}, control));
      });
      return result;
      }),
      save() {
        return null;
      },
    });
  }
});
