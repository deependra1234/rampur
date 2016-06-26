

<section id="footer_bottom_area">
    <div class="clearfix wrapper footer_bottom">
        <div class="clearfix copyright floatleft">
            <p> Copyright &copy; All rights reserved by <span>Webcos Software</span></p>
        </div>
        <div class="clearfix social floatright">
            <ul>
                <li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>
                <li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>
                <li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>
                <li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>
                <li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>
                <li><a class="tooltip" title="Pinterest" href=""><i class="fa fa-pinterest-square"></i></a></li>
                <li><a class="tooltip" title="RSS Feed" href=""><i class="fa fa-rss-square"></i></a></li>
                <li><a class="tooltip" title="Sitemap" href=""><i class="fa fa-sitemap"></i> </a></li>
            </ul>
        </div>
    </div>
</section>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>	
<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>		
<script type="text/javascript">
    $(document).ready(function () {
        $('.tooltip').tooltipster();
    });
</script>
<script type="text/javascript" src="js/selectnav.min.js"></script>
<script type="text/javascript">
    selectnav('nav', {
        label: '-Navigation-',
        nested: true,
        indent: '-'
    });
</script>		
<script src="js/pgwslider.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.pgwSlider').pgwSlider({
            intervalDuration: 5000

        });



        $('#wardid').on('change', function () {
            var ward = $(this).val();
            $.ajax({
                dataType: "html",
                type: "POST",
                cache: false,
                url: 'ajaxfunction.php',
                data: ({fn: 'getHeadName', ward: ward}),
                success: function (php_script_response) {

                    $('#head').html(php_script_response);
                },
                error: function () {
                    console.log('Error');
                }
            });

        });
        $('#head').on('change', function () {
            var fid = $(this).val();
            $.ajax({
                dataType: "html",
                type: "POST",
                cache: false,
                url: 'ajaxfunction.php',
                data: ({fn: 'getfamilyDetail', fid: fid}),
                success: function (php_script_response) {
                    console.log(php_script_response)
                    $('#familydetail').html(php_script_response);
                },
                error: function () {
                    console.log('Error');
                }
            });

        });
    });
</script>
<script type="text/javascript" src="js/placeholder_support_IE.js"></script>

<!--
---- Clean html template by http://WpFreeware.com
---- This is the main file (index.html).
---- You are allowed to change anything you like. Find out more Awesome Templates @ wpfreeware.com
---- Read License-readme.txt file to learn more.
-->	

</body>
</html>