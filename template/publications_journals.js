var LoadJournals = () => {
	GetAjaxData('db_journals.php');
	$(document).ajaxComplete(() => {
		let html = `
			<div class=" col-xs-12 col-sm-12">
	            <div class="p-20"></div>
		        <div class="block-title">
					<h2>Journals</h2>
		        </div>
		`;

		if (object.length > 0) {
			object.forEach((e) => {
				html += `
					<p>${e.title}</p>
					<p>${e.authors}</p>
					<p>${e.description}</p>
					<p>${e.date}</p>
					<p>${e.place}</p>
					<hr>
				`;
			});
		}
		html += '</div>';

		$('#data').html(html);
	});
};
