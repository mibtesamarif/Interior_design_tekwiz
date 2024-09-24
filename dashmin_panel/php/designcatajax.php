<?php
include('query.php');
                               $query=$pdo->query("select * from design_category");
                               $designCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                               foreach ($designCategories as $ctg) {
                                
                               ?>
                      <tr>
                       <!-- <td>1</td> -->
                        <td>
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                             <!-- <img src="assets/images/avatars/01.png" class="rounded-circle" width="44" height="44" alt=""> -->
                             <div class="">
                               <p class="mb-0"><?php echo $ctg['category_name']?></p>
                             </div>
                          </div>
                        </td>
                        <td><?php echo $ctg['des']?></td>
                        <td><img src="img/<?php echo $ctg['image']?>" height="50" alt=""></td>
                        <td><a href="editdesignctg.php?dgcid=<?php echo $ctg['c_id']?>" class="btn btn-info">Edit</a></td>
                        <td><a href="?ctgid=<?php echo $ctg['c_id']?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                     <?php
                       }
                       ?>