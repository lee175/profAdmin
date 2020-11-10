// Receive and output articles
var LoadStudents = (type) => {
    GetAjaxData('db_students.php', type);

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
								<h4 class="students-author">${e.name}</h4>
								<p class="students-firm">${e.title}</p>
							</div>

							<div class="students-text">
								<p>${e.description}</p>
								<p>${e.designation}</p>
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

$('#button_post').on('click', () => {
    LoadStudents('post');
    object = [];
});

$('#button_phd').on('click', () => {
    LoadStudents('phd');
    object = [];
});

$('#button_mtech').on('click', () => {
    LoadStudents('mtech');
    object = [];
});
