var LoadArticles = () => {
    GetAjaxData('db_articles.php');
    $(document).ajaxComplete(() => {
        let html = `
			<div class=" col-xs-12 col-sm-12">
	            <div class="p-20"></div>
		        <div class="block-title">
					<h1>Articles</h1>
				</div>
				<div class="p-50"></div>

		`;

        if (object.length > 0) {
            object.forEach((e) => {
                html += `
				<div class="info-list-w-icon" style="margin-top: -25px">
					<div class="info-block-w-icon">
						<div class="ci-text">
							<p style="font-size: 1.1em;">${e.authors} <cite style="font-weight: 900;">${e.title}</cite>, <span style="opacity: .6;"> ${e.description}, ${e.date}</span></p>													
							<p>${e.place}</p>
							<hr>
						</div>
					</div>
				</div>
				`;
            });
        }
        html += '</div>';

        $('#data').html(html);
    });
};