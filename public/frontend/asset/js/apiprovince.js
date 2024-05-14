document.addEventListener('DOMContentLoaded', function () {
    var provinceSelect = document.getElementById('city');
    var districtSelect = document.getElementById('district');
    var wardSelect = document.getElementById('ward');

    // Function to fetch data from API
    function fetchData(url, callback) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                callback(data);
            }
        };
        xhr.open('GET', url, true);
        xhr.send();
    }

    // Populate provinces dropdown
    fetchData('https://vapi.vnappmob.com/api/province', function (data) {
        data.results.forEach(function (province) {
            var option = document.createElement('option');
            option.text = province.province_name;
            option.value = province.province_id;
            provinceSelect.appendChild(option);
        });
    });

    // Event listener for province dropdown change
    provinceSelect.addEventListener('change', function () {
        var provinceId = this.value;
        // Clear previous options
        districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

        // Fetch districts based on selected province
        fetchData('https://vapi.vnappmob.com/api/province/district/' + provinceId, function (data) {
            data.results.forEach(function (district) {
                var option = document.createElement('option');
                option.text = district.district_name;
                option.value = district.district_id;
                districtSelect.appendChild(option);
            });
        });
    });

    // Event listener for district dropdown change
    districtSelect.addEventListener('change', function () {
        var districtId = this.value;
        // Clear previous options
        wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

        // Fetch wards based on selected district
        fetchData('https://vapi.vnappmob.com/api/province/ward/' + districtId, function (data) {
            data.results.forEach(function (ward) {
                var option = document.createElement('option');
                option.text = ward.ward_name;
                option.value = ward.ward_id;
                wardSelect.appendChild(option);
            });
        });
    });
});