<style>
    .wrapper {
        background-color: yellow;
        width: 40%;
        padding: 5px 0px 5px 0px;
    }

    #error {
        color: red;
        font-size: 20px;
        font-weight: bold;
    }

    label {
        width: 26%;
        display: inline-block;
    }

    div {
        padding: 10px 0px 0px 10px;
    }

    .input1 {
        width: 36%;
    }
</style>

<div class="wrapper">
    <h1> TÍNH TIỀN ĐIỆN </h1>
    <form name="registerForm" action="submitFormBt14.php" enctype="multipart/form-data"  method="POST" onsubmit="return validationForm()">
        <div id="error" style="color"></div>
        <div>
            <label>Họ tên</label>
            <input class="input1" type="text" name="name" required>
        </div>
        <p>Chân dung
            <input type="file" name="avatar" required>
        </p>
        <div>
            <label>Ngày sinh</label>
            <input class="input1" type="date" name="birthday" required>
        </div>
        <div>
            <label>Địa chỉ</label>
            <input class="input1" type="text" name="address" required>
        </div>
        <div>
            <label>Tỉnh thành</label>
            <select class="input1" type="text" name="city" required>
                <option value="">-- Chọn tỉnh thành --</option>
                <option>Quảng Nam</option>
                <option>Đà Nẵng</option>
                <option>Huế</option>
                <option>Hà Nội</option>
                <option>Sài Gòn</option>
            </select>
        </div>
        <div>
            <label>Giới tính :</label>
            <label>
                <input class="input1" name="gender" type="radio" value="Male">
                Nam
            </label>
            <label>
                <input class="input1" name="gender" type="radio" value="Female">
                Nữ
            </label>
        </div>
        <div>
            <label>Ngày sử dụng đầu kỳ</label>
            <input class="input1" type="date" name="firstday" required>
        </div>
        <div>
            <label>Ngày sử dụng cuối kỳ</label>
            <input class="input1" type="date" name="lastday" required>
        </div>
        <div>
            <label>Số điện đầu kỳ</label>
            <input class="input1" type="number" name="electricfirstday" required>
        </div>
        <div>
            <label>Số điện cuối kỳ</label>
            <input class="input1" type="number" name="electriclastday" required>
        </div>

        <div style="padding-left: 28%;">
            <input style="width: 100px;" type="submit" value="Tính" name="submitRegister">
        </div>
    </form>
</div>
<script>
    function validationForm() {
        var firstday = document.forms["registerForm"]["firstday"].value;
        var lastday = document.forms["registerForm"]["lastday"].value;

        var electricfirstday = document.forms["registerForm"]["electricfirstday"].value;
        var electriclastday = document.forms["registerForm"]["electriclastday"].value;

        var avatar = document.forms["registerForm"]["avatar"].value;

        var gender = document.forms["registerForm"]["gender"].value;

        var errorValid = '';

        if (firstday > lastday) {
            errorValid += 'Ngày cuối kỳ lớn hay ngày đầu kỳ </br>';
            document.getElementById('error').innerHTML = errorValid;
            return false;
        }
        if (electricfirstday > electriclastday) {
            errorValid += 'Số cuối kỳ lớn hơn số đầu kỳ </br>';
            document.getElementById('error').innerHTML = errorValid;
            return false;
        }
        if (gender == '') {
            errorValid += 'Chọn giới tính </br>';
            document.getElementById('error').innerHTML = errorValid;
            return false;
        }
    }
</script>