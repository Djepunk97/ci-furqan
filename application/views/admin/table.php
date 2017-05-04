              <h1>Table <?php echo $table;?></h1><br>
              <a class="btn btn-success" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data
              </a>
              <br>
              <div class="collapse" id="collapseExample">
                <div class="well">
                  Basic panel example
                </div>
              </div>
              <br>
              <table class="table table-hover">
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Fahrul</td>
                  <td>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </button>
                    <span>|</span>
                    <button class="btn btn-danger" type="button">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                    </button>
                  </td>
                </tr>
              </table