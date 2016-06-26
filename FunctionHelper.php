<?php

class HelperFunction {

    public $con = null;

    public function __construct() {

        $this->con = mysqli_connect("localhost", "rampurka_root", "Java@05872", "rampurka_survey")or die(mysqli_connect_error());
    }

    public function getWardsListHtml() {

        $result = mysqli_query($this->con, "select * from ward")or die(mysqli_error($this->con));
        ;

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<option class='hindi' value='" . $row["id"] . "' >" . $row["name"] . " ¼ " . $row["wardno"] . " ½ </option>";
            }
        } else {
            echo "<option value='-1'>खाली है</option>";
        }
    }

    public function getHeadName($ward) {

        $result = mysqli_query($this->con, "select * from family_registres where 	ward_id=$ward")or die(mysqli_error($this->con));
        ;

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<option style='font-family' value='" . $row["id"] . "' >" . $row["head_person_name"] . " ¼ " . $row["house_no"] . " ½ </option>";
            }
        } else {
            echo "<option value='-1'>खाली है</option>";
        }
    }

    public function getFamilyDetail($fid) {

        $result = mysqli_query($this->con, "SELECT * from person WHERE family_registration_id = $fid ")or die(mysqli_error($this->con));
        $result1 = mysqli_query($this->con, "SELECT * from family_registres WHERE id = $fid  limit 1")or die(mysqli_error($this->con));
        $wardname = "";
        $houseno = "";
        $headmember = "";
        $remark = "";
        while ($row1 = $result1->fetch_assoc()) {
            $wardname = $row1['ward_number'];
            $houseno = $row1['house_no'];
            $headmember = $row1['head_person_name'];
            $remark = $row1['remark'];
        }

        if ($result->num_rows > 0) {
            $i = 1;
            ?>


            <div style="overflow: auto" class="table">

                <table border="1" style="width: 100%">
                    <tbody><tr>
                            <th>वार्ड न०</th><td ><?= $wardname ?></td>

                            <th>मकान न०</th><td><?= $houseno ?></td>
                            <th>मुखिया </th><td class="hindi"><?= $headmember ?></td>
                            <th>नगर पंचायत का नाम </th><td>रामपुर कारखाना</td>
                            <th>जनपद </th><td>देवरिया(उ0 प्र0)</td>
                        </tr>
                    </tbody></table>
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>क्र0 स0</th>
                            <th>परिवार के सदस्यो का नाम</th>
                            <th>पिता / पति का नाम</th>
                            <th>पुरुष या स्त्री</th>
                            <th>धर्म अनुसूचित जाती की दशा मे</th>
                            <th>जन्म तिथी यदि ज्ञात हो</th>
                            <th>धन्धा</th>
                            <th>साछर / निरछर</th>


                        </tr>

                    </thead>    
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>

                                <td class="hindi">
                                    <?= $row["name"] ?>
                                </td>
                                <td class="hindi">
                                    <?= $row["father_name"] ?>
                                </td>
                                <td class="hindi">
                                    <?= ($row["gender"] ) ?>
                                </td>
                                <td class="hindi">
                                    <?= $row["casts"] ?>
                                </td>
                                <td>
                                    <?= $row["dob"] ?>
                                </td>
                                <td class="hindi">
                                    <?= $row["occoupation"] ?>
                                </td>
                                <td class="hindi">
                                    <?= $row["qualification"] ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>


            </div>
            <?php
        } else {
            echo "खाली है";
        }
    }

}
