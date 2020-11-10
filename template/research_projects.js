var LoadProjects = () => {
	GetAjaxData('db_projects.php');
	$(document).ajaxComplete(() => {
		let html = `
			<div class=" col-xs-12 col-sm-12">
	            <div class="p-20"></div>
		        <div class="block-title">
					<h2>Projects</h2>
		        </div>
		`;

		if (object.length > 0) {
			object.forEach((e) => {
				html += `
					<p>${e.title}</p>
					<p>${e.place}</p>
					<p>${e.role}</p>
					<p>${e.duration}</p>
					<p>${e.date_start} - ${e.date_end}</p>
					<hr>
				`;
			});
		}
		html += '</div>';

		$('#data').html(html);
	});
};
