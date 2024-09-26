<!-- Modal -->
<form action="" method="POST" id="myForm" enctype="multipart/form-data">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        New</span> 
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">All your saved works will list here as version.</div>          
                    <div class="table-responsive">
                        <table class="display table table-hover " >
                            <thead class="thead-primary">
                                <tr class="text-uppercase text-primary3 bg-white ">
                                    <th>Version Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                $stmt = $vivid_vision->get_all_versions();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                                            <td>'.$row['created_at'].'</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="index.php?id='.$row['id_vivid'].'" type="submit" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> Edit</a>
                                                    <a href="function/pdf.php?id='.$row['id_vivid'].'" type="submit" class="btn btn-warning btn-sm"><i class="far fa-eye"></i> PDF</a>
                                                    <button type="button" data-id="'.$row['id'].'" class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                                </div>
                                            </td>
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>