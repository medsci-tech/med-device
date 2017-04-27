import $ from 'jquery'

let $data

function fetchData() {
	return $.getJSON('/json/loc.json').then(data => {
		$data = data
		
		return $data
	})
}
fetchData()

$.fn.locationSelector = locationSelector

function _selector(input, config) {
	let $input = $(input),
		$id = '_modal_' + Date.now().toString(36),
		$init = false

	let $modal = $(`<div class="modal fade" id="${ $id }" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<style>
			.loc-selector .btn{
				margin: 2px
			}
			</style>
			<div class="modal-content">
				<div class="modal-body loc-selector">
					<div class="_l1"></div>
					<div class="_l2"></div>
					<div class="_l3"></div>
				</div>
			</div>
		</div>
	</div>`)
	$modal.appendTo('body')
	let inputTimer = null
	let inputEvent = function(e) {
		let input = e.target
		clearTimeout(inputTimer)
		inputTimer = setTimeout(function() {
			console.log(input.value)
		}, 300)
	}
	$input.on('click', e => {
		if(!$init){
			if(!$data){
				fetchData().then(render).then(x => $init = true)
			}
			else{
				render($data)
				$init = true;
			}
		}
		$modal.modal()
	})

	let l1 = $modal.find('._l1'),
		l2 = $modal.find('._l2'),
		l3 = $modal.find('._l3')

	let $prov, $city, $area

	l1.on('click', function(e) {
		let $tar = $(e.target)
		let id = $tar.attr('data-loc-id')
		if (id) {
			if ($prov) {
				$tar.removeClass('active')
				l1.find('.btn').removeClass('hide')
				l2.html('')
				l3.html('')
				$prov = $city = $area = void 0
			} else {
				l1.find('.btn').addClass('hide')
				$tar.removeClass('hide').addClass('active')
				$data.some(function(prov) {
					if (prov.id === id) {
						$prov = prov
						return true
					}
				})
				if ($prov.cities) {
					l2.html($prov.cities.map(function(city) {
						return '<a class="btn btn-sm btn-default" data-loc-id="' + city.id + '" data-loc-name="' + city.name + '">' + city.name + '</a>'
					}))
					if ($prov.cities.length === 1) {
						l2.find('.btn').click()
					}
				} else {
					output.val($prov.name)
					reset()
				}
			}
		}
	})
	l2.on('click', function(e) {
		let $tar = $(e.target)
		let id = $tar.attr('data-loc-id')
		if (id) {
			if ($city) {
				$tar.removeClass('active')
				l2.find('.btn').removeClass('hide')
				l3.html('')
				$city = $area = void 0
			} else {
				l2.find('.btn').addClass('hide')
				$tar.removeClass('hide').addClass('active')
				$prov.cities.some(function(city) {
					if (city.id === id) {
						$city = city
						return true
					}
				})
				if ($city.areas) {
					l3.html($city.areas.map(function(area) {
						return '<a class="btn btn-sm btn-default" data-loc-id="' + area.id + '" data-loc-name="' + area.name + '">' + area.name + '</a>'
					}))
				} else {
					output.val([$prov.name, $city.name].join(' - '))
					reset()
				}
			}
		}
	})
	l3.on('click', function(e) {
		let $tar = $(e.target)
		l3.find('.btn').removeClass('active')
		$tar.addClass('active')
		$input.val([$prov.name, $city.name, $tar.attr('data-loc-name')].join(' - '))
		reset()
	})


	function reset() {
		$modal.modal('hide')
	}

	function render(data) {
		l1.html(data.map(function(prov) {
			return '<a class="btn btn-sm btn-default" data-loc-id="' + prov.id + '" data-loc-name="' + prov.name + '">' + prov.name + '</a>'
		}).join(''))
	}

}
export default function locationSelector(config){
	this.attr('readonly', 'readonly').each(function(i, input){
		_selector(input, config)
	})
	return this
}
