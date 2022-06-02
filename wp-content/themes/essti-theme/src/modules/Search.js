import axios from "axios"

class Search {
	// 1- Describe and initiate object
	constructor() {
		this.addSearchOverlay()
		this.searchField = document.querySelector("#search-term")
		this.searchResults= document.querySelector("#search-overlay__results")
		this.openButton = document.querySelectorAll(".js-search-trigger")
		this.closeButton = document.querySelector(".search-overlay__close")
		this.searchOverlay = document.querySelector(".search-overlay")
		this.previousSearchValue
		this.events()
		this.isOverlayOpen = false
		this.isSpinnerVisible = false
		this.searchTimer

	}

//	2- Events
	events() {
		this.openButton.forEach(el => {
			el.addEventListener('click', e => {
				e.preventDefault()
				this.openOverlay()
			})
		})

		this.closeButton.addEventListener("click", () => this.closeOverlay())
		document.addEventListener("keydown", (e) => this.keyPressDispatcher(e))
		this.searchField.addEventListener("keyup", () => this.typingLogic())
	}

//	3- Methods/ Functions/ Action
	typingLogic(){
		if(this.searchField.value !== this.previousSearchValue) {
			clearTimeout(this.searchTimer)

			if (this.searchField.value) {
				if (!this.isSpinnerVisible) {
					this.searchResults.innerHTML = '<div class="spinner-loader"></div>'
					this.isSpinnerVisible = true
				}
				this.searchTimer = setTimeout(this.getResults.bind(this), 750)
			} else {
				this.searchResults.innerHTML = ''
				this.isSpinnerVisible = false
			}

		}
		this.previousSearchValue = this.searchField.value
	}

	async getResults(){
		try {
			const response = await axios.get(esstiData.root_url + '/wp-json/essti/v1/search?keyword=' + this.searchField.value)
			const results = response.data
			this.searchResults.innerHTML = `
				<div class="row">
				
					<div class="one-third">
						<h2 class="search-overlay__section-title">General Information</h2>
							${results.generalInfo.length ? '<ul class="min-list link-list">' : '<p>No general information match your request</p>'}
							${results.generalInfo.map(item => `<li><a href="${item.link}">${item.title}</a> ${item.postType === 'post' ? `by ${item.authorName}` : ''}</li>`).join('')}
							${results.generalInfo.length ? '</ul>' : ''}
					</div>
					
					<div class="one-third">
						<h2 class="search-overlay__section-title">Academics</h2>
							${results.academics.length ? '<ul class="min-list link-list">' : `<p>No academics match your request. <br><a href="${esstiData.root_url}/academics">View all academics</a></p>`}
							${results.academics.map(item => `<li><a href="${item.link}">${item.title}</a></li>`).join('')}
							${results.academics.length ? '</ul>' : ''}
						<h2 class="search-overlay__section-title">Researchers</h2>
						${results.researchers.length ? '<ul class="professor-cards">' : '<p>No researchers have information that match your request.</p>'}
							${results.researchers.map(item => `
								<li class="professor-card__list-item">
									<a class="professor-card" href="${item.link}">
										<img class="professor-card__image" src="${item.image}">
										<span class="professor-card__name">${item.title}</span>
									</a>
								</li>
							`).join('')}
							${results.researchers.length ? '</ul>' : ''}
					</div>
					
					<div class="one-third">
						<h2 class="search-overlay__section-title">Events</h2>
						${results.events.length ? '' : `<p>No event information match your request. <br><a href="${esstiData.root_url}/events">View all events</a></p>`}
							${results.events.map(item => `
								<div class="event-summary">
									<a class="event-summary__date event-summary__date t-center" href="${item.link}">
										<span class="event-summary__month">${item.month}</span>
										<span class="event-summary__day">${item.day}</span>
									</a>
									<div class="event-summary__content">
										<h5 class="event-summary__title headline headline--tiny">
											<a href="${item.link}">${item.title}</a></h5>
										<p>${item.description}<a href="${item.link}" class="nu gray">Read more</a></p>
									</div>
								</div>
							`).join('')}
					</div>
				</div>
			`
			this.isSpinnerVisible = false
		}
		catch (e) {
			console.log(e)
		}
	}

	keyPressDispatcher(event) {
		if (event.keyCode === 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
			this.openOverlay()
		}
		if (event.keyCode === 27 && this.isOverlayOpen) {
			this.closeOverlay()
		}
	}

	openOverlay() {
		this.searchOverlay.classList.add("search-overlay--active")
		document.body.classList.add("body-no-scroll")
		this.searchField.value = ""
		setTimeout(()=> this.searchField.focus() , 302)
		this.isOverlayOpen=true
		return false
	}

	closeOverlay() {
		this.searchOverlay.classList.remove("search-overlay--active")
		document.body.classList.remove("body-no-scroll")
		this.searchField.blur()
		this.searchResults.innerHTML = ''
		this.isOverlayOpen = false
	}

	addSearchOverlay() {
		document.body.insertAdjacentHTML(
			'beforeend',
			`
			<div class="search-overlay">
				<div class="search-overlay__top">
					<div class="container">
						<i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
						<input type="text"
							 class="search-term"
							 placeholder="Let us know what you are looking for..."
							 id="search-term" autofocus>
						<i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
					</div>
				</div>
				<div class="container">
					<div id="search-overlay__results">
				
					</div>
				</div>
			</div>
		`)
	}
}

export default Search