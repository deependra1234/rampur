<?php
require_once './header.php';

require_once './FunctionHelper.php';
$d = new HelperFunction();
?>

    <section id="content_area">
        <div class="clearfix wrapper main_content_area">

            <div class="clearfix main_content floatleft">


                <div class="clearfix content">
                    <div class="content_title"><h2>परिवार रजिस्टर</h2></div>
                    <div class="single_work_page clearfix">

                        <div class="work_meta clearfix">
                            <form method="post">
                                <table style="width: 100%">
                                        <tr>
                                            <th>
                                                वार्ड चुने
                                            </th>
                                            <td>
                                                <select class="hindi" name="ward_id" id="wardid">
                                                    <option>चुने</option>
                                                    <?php
                                                    $d->getWardsListHtml();
                                                    ?>
                                                </select>
                                            </td>
                                            <th>
                                                मुखिया चुने
                                            </th>
                                            <td>
                                                <select class="hindi" name="head" id="head">
                                                    <option>चुने</option>

                                                </select>
                                            </td>
                                        </tr>
                                    </table>

                                <div id="familydetail" class="table">

                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>

                </div>
                <?php
                require_once './right_panel.php';
                ?>
            </div>
        </section>
        <?php
        require_once './footer.php';
        ?>