<?php
//include_once("Ctr/footer.php");
//include("Entity/crud_film.php");
$obj=new footer();
$o=new episode();
//$idF='';
?>
<div align="center" class="table-responsive"><h3>All The Data</h3>
    <div style="float: left"><tr class="success">
            <td scope="col" colspan="5">
                <div align="left">
                    <button class="btn">
                        <a href="?cache=view&module=add_episode&idF=0">Insert New Data</a>
                    </button>
                </div>
            </td>
        </tr>
    </div>
    <div style="float: right">
         <form action="?cache=view&module=episode" method="POST">
            <div>
                <input type="text" name="nameF" placeholder="Search for..">
        <input class="btn btn-secondary" type="submit" name="search" value="Go!">
            </div>
        </form></div>
    <table width="750" border="1" class="table">
        <thead class="thead-inverse">
        <tr class="something">
            <th>Id</th>
            <th style="min-height: 50px">Name Episode</th>
            <th>Name Movie</th>
            <th>Url 1</th>
            <th>Url 2</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        if(isset($_REQUEST['del_id']))
        { if($o->deleteDataEpisode($_REQUEST['del_id']))
        {  echo"Your Data Successfully Deleted";
        }
        }
        if(isset($_REQUEST['search'])) {
            extract($_REQUEST);
            $name = $_REQUEST['nameF'];
            if ($o->searchFilm($name,'episode')!= null) {
                foreach($o->searchFilm($name,'episode') as $values){
                    $id = $values["id_episode"];
                    $idF=$values['id_film'];
                    ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $values["name"] ?></td>
                        <td><?php echo $values["film_name"] ?></td>
                        <td><?php echo $values["url1"] ?></td>
                        <td><?php echo $values["url2"] ?></td>
                        <td>
                            <button class="btn"><a
                                    href="?cache=view&module=update_episode&update_id=<?php echo $id ?>">Edit</a></button>
                            &nbsp;&nbsp;
                            <button class="btn"><a onclick="return confirm('Are you sure want to delete it?')"
                                                   href="?cache=view&module=episode&del_id=<?php echo $id ?>">Delete</a>
                            </button>
                            <button class="btn"><a href="?cache=view&module=add_episode&idF=<?php echo $idF ?>">Insert</a></button>
                        </td>
                    </tr>

                    <?php
                }
               echo  '</table>';

                   // echo $values['film_name'];
                }
            else{
                echo '<div align="center"><b><h4>Search Fail</h4></b></div>';
                echo'</table>';
            }

            } else {
        $records_per_page = 10;
        $query = $obj->pagingFilm($records_per_page);
        if ($obj->showData($query) != Null) {
            foreach ($obj->showData($query) as $value) {
                $id = $value["id_episode"]
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $value["name"] ?></td>
                    <td><?php echo $value["film_name"] ?></td>
                    <td><?php echo $value["url1"] ?></td>
                    <td><?php echo $value["url2"] ?></td>
                    <td>
                        <button class="btn"><a
                                href="?cache=view&module=update_episode&update_id=<?php echo $id ?>">Edit</a></button>
                        &nbsp;&nbsp;
                        <button class="btn"><a onclick="return confirm('Are you sure want to delete it?')"
                                               href="?cache=view&module=episode&del_id=<?php echo $id ?>">Delete</a>
                        </button>
                    </td>
                </tr>

                <?php
            }
        }
        ?>


    </table>

    <div class="pagination-wrap">
        <?php
        $query2 = $obj->returnQuery("episode");
        $obj->page($query2, $records_per_page);
        ?>
    </div>
    <?php
    }
    ?>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              