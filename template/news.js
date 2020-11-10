// Receive and output articles
var LoadNews = () => {
    GetAjaxData('db_news_pic.php');

    $(document).ajaxComplete(() => {
        let html = `
				<div class="row">
					<div class="p-20"></div>
		`;

        if (object.length > 0) {
            object.forEach((e) => {
                html += `
				<div class=" col-xs-12 col-sm-6">
					<div class="testimonial-item" style="padding-bottom: 0px">
						<div class="testimonial-content" style="max-height: 200px; height: 200px;">
							<div class="students-picture">
								<img src="img/testimonials/testimonial-1.jpg" alt="Billy Adams" />
							</div>

							<div class="students-author-info">
								<p class="students-firm">${e.title}</p>
							</div>

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

LoadNews();
object = [];