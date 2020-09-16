// makes sure we always get the event, also if the event was already fired when adding the event listener
export function onVideoLoadedMetaData(videoEl) {
	return new Promise((resolve) => {
		if (videoEl.readyState >= 2) {
			return resolve(videoEl)
		}

		videoEl.addEventListener('loadedmetadata', () => {
			resolve(videoEl)
		});
	})
}

// the video should play faster if the user scrolls faster
// also it should stop smoothly
export function setPlaybackRateByTargetTime(videoEl, targetTime) {
	const minPlaybackRate = 0.3
	const maxPlaybackRate = 20
	let playbackRate = targetTime - videoEl.currentTime // the difference between the current and the maximum position

	console.log({playbackRate})

	if (
		playbackRate < 0 ||               // video should seek backwards
		videoEl.currentTime >= targetTime // video reached current stop mark
	) {
		// make sure the comparison works by using the same amount of decimals by using toFixed
		if (videoEl.currentTime.toFixed(5) === targetTime.toFixed(5)) {
			videoEl.currentTime = targetTime
		}

		videoEl.pause()
		return
	}

	if (playbackRate < minPlaybackRate) {
		playbackRate = minPlaybackRate
	} else if (playbackRate > maxPlaybackRate) {
		playbackRate = maxPlaybackRate
	}

	if (playbackRate !== 0) {
		videoEl.playbackRate = playbackRate
	}
}

export function onElementEnter($element) {
	$element.addClass('video-sync--active')
}

export function onElementLeave($element) {
	$element.removeClass('video-sync--active')
}
