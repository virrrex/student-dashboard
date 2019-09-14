<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <?php $page = $_SERVER['SCRIPT_NAME']; ?>

             <li class="<?php echo ($page=='/project/dashboard.php'?'active-link':''); ?>" >
                <a href="dashboard.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
            </li>


            <li class="<?php echo ($page=='/project/courses.php'?'active-link':''); ?>">
                <a href="courses.php"><i class="fa fa-book "></i>Courses<span class="badge"></span></a>
            </li>
            <li class="<?php echo ($page=='/project/students.php'?'active-link':''); ?>">
                <a href="students.php"><i class="fa fa-user "></i>Students<span class="badge"></span></a>
            </li>
            <li class="<?php echo ($page=='/project/prices.php'?'active-link':''); ?>">
                <a href="prices.php"><i class="fa fa-tag "></i>Prices<span class="badge"></span></a>
            </li>

        </ul>
    </div>

</nav>
