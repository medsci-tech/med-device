import $ from 'jquery'
window.$ = window.jQuery = $

$('form[name="searchForm"]').on('submit', function(e){
	if(this.keyword.value.trim()){
		this.keyword.value = this.keyword.value.trim()
	}
	else{
		sweetAlert("请输入搜索关键词!")
		e.preventDefault()
	}
})