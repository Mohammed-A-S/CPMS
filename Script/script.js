const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=>
	{
		const li = item.parentElement;
		
		item.addEventListener('click', function()
		{
			allSideMenu.forEach(i=> 
				{
					i.parentElement.classList.remove('active');
				})
			li.classList.add('active');
		})
	});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-border-left');
const sidebar = document.getElementById('sidebar');
const sidebar_text = document.querySelector('#sidebar .text');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
	sidebar_text.classList.style.display = "none";
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('nav-link', 'bx-border-left');
		} else {
			searchButtonIcon.classList.replace('bx-border-left', 'nav-link');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-border-left', 'nav-link');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-border-left', 'nav-link');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})






//for change the status of the campaign
const c_status = document.getElementsByClassName('process');
const a_required = document.getElementsByClassName('A_REQUIRED');
const a_paid = document.getElementsByClassName('A_PAID');

if(a_required === a_paid)
{
	//change the background color
}
