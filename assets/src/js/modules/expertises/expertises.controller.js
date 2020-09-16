import $ from 'jquery'
import ScrollMagic from 'scrollmagic'

import { VideoSyncController } from './video-sync-controller'
import { fadeIn, fadeOut, onVideoLoadedMetaData, setPlaybackRateByTargetTime } from './expertises.helpers'

$(document).on('ready', () => {
	const $containers = $('.expertises')

	if (!$containers.length) {
		return
	}

	const controller = new ScrollMagic.Controller()

	// create independent handler for every .expertises element per page
	$containers.each((i, container) => {
		const $container = $(container)

		const $video = $container.find('.expertises__video')
		// used for conversion between scroll position <=> video time
		const videoFps = $video.data('video-fps')

		// data-video-sync must be in format
		// {
		//   enter: number, // time in seconds when onElementEnter is called
		//   leave: number, // time in seconds when onElementLeave is called
		// }
		const $videoSyncElements = $container.find('[data-video-sync]')
		// controls element visibility based on data-video-sync
		const videoSyncController = new VideoSyncController($videoSyncElements, fadeIn, fadeOut)

		onVideoLoadedMetaData($video[0])
			.then((videoEl) => {
				const duration = videoEl.duration
				const videoFrameCount = duration * videoFps * 60
				// this determines the height of the element
				const videoFrameCountPerScrollPixel = 4

				let targetTime = 0

				videoSyncController.triggerTimeupdate(videoEl.currentTime)

				videoEl.addEventListener('timeupdate', () => {
					// the video should play faster if the user scrolls faster
					// also it should stop smoothly
					setPlaybackRateByTargetTime(videoEl, targetTime)

					videoSyncController.triggerTimeupdate(videoEl.currentTime)
				})

				new ScrollMagic
					.Scene({
						triggerElement: $container[0],
						triggerHook: 0,
						duration: videoFrameCount / videoFrameCountPerScrollPixel,
					})
					.on('start', (event) => {
						targetTime = duration * event.progress
						videoEl.currentTime = targetTime
					})
					.on('progress', (event) => {
						targetTime = duration * event.progress

						if (event.scrollDirection !== 'FORWARD') {
							// scrollDirection is REVERSE or PAUSED
							videoEl.currentTime = targetTime
						} else if (!videoEl.playing && targetTime <= duration) {
							// scrollDirection is FORWARD
							videoEl.play()
						}
					})
					.setPin($container[0]) // pins the element for the the scene's duration
					.addTo(controller)
			});
	})
})
