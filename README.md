# understrap-dfrost
DFrost Child Theme for UnderStrap Theme Framework: https://github.com/understrap/understrap

## How it works
Understrap Child Theme shares with the parent theme all PHP files and adds its own functions.php on top of the UnderStrap parent theme's functions.php.

**IT DOES NOT LOAD THE PARENT THEMES CSS FILE(S)!** Instead it uses the UnderStrap Parent Theme as a dependency via npm and compiles its own CSS file from it.

Understrap Child Theme uses the Enqueue method to load and sort the CSS file the right way instead of the old @import method.

## Installation
1. Install the parent theme UnderStrap first: `https://github.com/understrap/understrap`
   - IMPORTANT: If you download UnderStrap from GitHub make sure you rename the "understrap-master.zip" file to "understrap.zip" or you might have problems using this child theme!
1. Upload the understrap-dfrost folder to your wp-content/themes directory
1. Go into your WP admin backend 
1. Go to "Appearance -> Themes"
1. Activate the UnderStrap Child theme

## Editing
Add your own CSS styles to `assets/sass/theme/_child_theme.scss`

To overwrite Bootstrap's or UnderStrap's base variables just add your own value to:
`assets/sass/theme/_child_theme_variables.scss`

For example, the "$brand-primary" variable is used by both Bootstrap and UnderStrap.

Add your own color like: `$brand-primary: #ff6600;` in `/sass/theme/_child_theme_variables.scss` to overwrite it. This change will automatically apply to all elements that use the $brand-primary variable.

It will be outputted into:
`assets/css/child-theme.min.css`

So you have one clean CSS file at the end and just one request.

## Developing With NPM, Gulp, SASS and Browser Sync

### Installing Dependencies
- Make sure you have installed Node.js
- Open your terminal and browse to the location of your UnderStrap copy
- Run: `$ npm install`

### Running
To work and compile your Sass files on the fly start:

- `$ npm run css:front`  
- `$ npm run css:admin`

To compile Javascript files run:
- `$ npm run js:dev`  
- `$ npm run all:dev`

To update files on the server:
```
{
    "name": "DFROST Staging",
    "host": "0.0.0.0",
    "protocol": "ftp",
    "port": 21,
    "username": "username",
    "password": "xxxxxx",
    "context": "public_html/wp-content/",
    "remotePath": "/httpdocs/wp-content/",
    "ignore": [
        "*.scss"
    ],
    "watcher": {
        "files": "**/{*.css,*.map,*.js,*.php}",
        "autoUpload": true,
        "uploadOnSave": true,
        "autoDelete": false
    },
    "uploadOnSave": true
}
```

## Icons
Use [icomoon application](https://icomoon.io/app/#/select) to manage icons in one font file.  
You can import the file `/src/icomoon/DFrost.json` into icomoon application.

## Admin UI

### Custom Post Types
Custom post types are used with Advanced Custom Fields.

#### Persons
Persons are used for contacts.

#### Stories
Stories are used for Stories page and on Home page stories full screen block `height: 100vh`.

#### Works
Works are used for [Projects page](https://www.dfrost.com/projects/) and on Home page works block.

#### Brands
Brands are used for [Clients page](https://www.dfrost.com/clients/) and on Home page Brands are friends block.

### Gutenberg Custom Blocks
- Configuratione file for blocks `/config/gutenberg-blocks.php`.
- Javascript file for blocks `/js/admin/blocks.js`.

