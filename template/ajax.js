// Variable to store the data received from database
var object = [];

// Get data from database into object
var GetAjaxData = (url, payload) => {
	$.getJSON(url, {'payload': payload}, (data) => {
		object = data;
	});
}