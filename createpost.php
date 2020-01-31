<?php
$navbar = array("", "active","","","");
$sport = array("การยิงธนู", "กรีฑา", "แบดมินตัน", "กีฬาเบสบอล", "บาสเกตบอล", "หาดวอลเลย์บอล", "มวย", "เรือแคนู / พื้นน้ำเรียบเรือคายัค", "เรือแคนู / เรือคายัคสลาลม", "BMX ขี่จักรยาน", "ขี่จักรยานเสือภูเขา", "จักรยานถนน", "ติดตามการปั่นจักรยาน", "การดำน้ำ", "นักขี่ม้า", "การเล่นฟันดาบ", "ฟุตบอล", "ยิมนาสติกสากล", "ยิมนาสติกเข้าจังหวะ", "แทรมโพลี", "แฮนด์บอล", "ฮอกกี้", "ยูโด", "ปัญจกรีฑาสมัยใหม่", "การโยกย้าย", "การแล่นเรือ", "การยิง", "ซอฟท์บอล", "ว่ายน้ำ", "Synchronized ว่ายน้ำ", "เทเบิลเทนนิส", "เทควันโดทำ", "เทนนิส", "ไตรกีฬา", "วอลเลย์บอล", "น้ำโปโล", "ยกน้ำหนัก", "มวยปล้ำ");
$aria = array("คลองสาน", "คลองเตย", "จอมทอง", "จตุจักร", "ดุสิต", "ดอนเมือง", "ตลิ่งชัน", "ธนบุรี", "บางกอกน้อย", "บางกอกใหญ่", "บางกะปิ", "บางขุนเทียน", "บางเขน", "บางคอแหลม", "บางซื่อ", "บางพลัด", "บางรัก", "บึงกุ่ม", "ประเวศ", "ปทุมวัน", "ป้อมปราบศัตรูพ่าย", "พญาไท", "พระโขนง", "พระนคร", "ภาษีเจริญ", "มีนบุรี", "ยานนาวา", "ราชเทวี", "ราษฎร์บูรณะ", "ลาดกระบัง", "ลาดพร้าว", "สาทร", "สัมพันธวงศ์", "หนองแขม", "หนองจอก", "ห้วยขวาง", "สวนหลวง", "ดินแดง", "หลักสี่", "สายไหม", "คันนายาว", "สะพานสูง", "วังทองหลาง", "คลองสามวา", "วัฒนา", "บางนา", "ทวีวัฒนา", "บางแค", "ทุ่งครุ", "บางบอน");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "head.php"; ?>

    <style>
        .custom-file {
            margin-top: 15px;
        }
        .hide{
            display: none;
        }
    </style>



</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <div style="  box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.3), 0 20px 30px 0 rgba(0, 0, 0, 0.19);margin-bottom:25px;">
            <div style="margin-top:25px;background-color:white;">
                <div class="card  mx-auto">
                    <div class="card-header">
                        <h5 style="text-align: center;">ลงประกาศสอน</h5>
                    </div>
                    <form action="function/insertpost.php" name="insertpost" id="insertpost" method="POST" enctype="multipart/form-data">
                        <div class="card-body col-6 mx-auto">
                            <div class="form-group hide">
                                <label for="exampleFormControlInput1">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" name="name" placeholder="กรุณาใส่ชื่อ-นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">กีฬาที่สอน</label>
                                <select class="form-control" name="sport">
                                    <option></option>
                                    <?php foreach ($sport as $value) {
                                        echo "<option>$value</option>"; ?>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ผลงาน</label>
                                <textarea class="form-control" name="work" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">สถาณที่เปิดสอน</label>
                                <input type="text" class="form-control" name="address" placeholder="กรุณาระบุที่อยู่สถาณที่" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">เขตพื้นที่</label>
                                <select class="form-control" name="location">
                                    <option></option>
                                    <?php foreach ($aria as $value) {
                                        echo "<option>$value</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">เบอร์โทรศัพท์ติดต่อ</label>
                                <input type="telephone" class="form-control" name="telephone" placeholder="กรุณาใส่หมายเลขเบอร์โทรศัพท์" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">อีเมล์</label>
                                <input type="email" class="form-control" name="email" placeholder="กรุณาใส่อีเมลของท่าน" required>
                            </div>

                            <div class="custom-file " id="addrow">
                                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload"accept=".jpg,.jpeg,.png" aria-describedby="inputGroupFileAddon01" required multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <div class="custom-file hide" id="addrow2">
                                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload"accept=".jpg,.jpeg,.png" aria-describedby="inputGroupFileAddon01" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <div class="custom-file hide" id="addrow3">
                                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload"accept=".jpg,.jpeg,.png" aria-describedby="inputGroupFileAddon01" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <div class="custom-file hide" id="addrow4">
                                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload"accept=".jpg,.jpeg,.png" aria-describedby="inputGroupFileAddon01" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <div class="custom-file hide" id="addrow5">
                                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload"accept=".jpg,.jpeg,.png" aria-describedby="inputGroupFileAddon01" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            <button type="button"class="btn btn-warning btn-block btn-sm" id="addrowfile">เพิ่มรูปภาพ</button>




                            <div class="text-center row" style="margin-top:10px;">
                                <br>
                                <button class="btn btn-danger  btn-block col-6" onclick="window.history.back();">ย้อนกลับ</button>
                                <br>
                                <button name="sentpost" id="sentpost" class="btn btn-success  btn-block col-6" type="submit">ลงประกาศ</button>
                            </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>
$(document).ready(function(){
    var row = 2;
    $('#fileToUpload').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);

    });

    $('#addrowfile').on('click', function() {

                $('#addrow'+row).removeClass('hide');
                row= row+1;
                if(row == 6){
                 $('#addrowfile').text('จำกัดสูงสุดได้เพียง5รูปเท่านั้นคับ')

                }
        });
});
</script>
</body>

</html>