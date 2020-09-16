export class VideoSyncController {
	constructor($videoSyncElements, onElementEnter, onElementLeave) {
		this.items = []
		this.onElementEnter = typeof onElementEnter === 'function' ? onElementEnter : () => {}
		this.onElementLeave = typeof onElementLeave === 'function' ? onElementLeave : () => {}

		$videoSyncElements.each((i, el) => {
			const $element = $(el)

			// data-video-sync must be in format
			// {
			//   enter: number, // time in seconds when onElementEnter is called
			//   leave: number, // time in seconds when onElementLeave is called
			// }
			const config = $element.data('video-sync')

			if (
				!config ||
				typeof config !== 'object' ||
				typeof config.enter !== 'number' ||
				typeof config.leave !== 'number'
			) {
				return
			}

			this.items.push({
				$element,
				config,
				active: false,
			})
		})
	}

	triggerTimeupdate(time) {
		for (const item of this.items) {
			const shouldBeActive = item.config.enter <= time && item.config.leave > time

			if (shouldBeActive === item.active) {
				// element already has the correct status
				continue
			}

			item.active = shouldBeActive

			if (shouldBeActive) {
				this.onElementEnter(item.$element)
			} else {
				this.onElementLeave(item.$element)
			}
		}
	}
}
