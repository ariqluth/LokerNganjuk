<?php
unset($_SESSION['cvId']); 
?>
                  <table id="data-table">
                      <tr>
                          <th width="250px">Media Sosial</th>
                          <th width="600px">Nama / Link Media Sosial</th>
                      </tr>
                      <tr>
                          <td>
                            <select class="form-control" name="jenis_sosial_media[]">
                              <option value="">Pilih Media Sosial</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Twitter">Twitter</option>
                      <option value="LinkedIn">LinkedIn</option>
                      <option value="Youtube">Youtube</option>
                            </select>
                          </td>
                          <td><input type="text" class="form-control" name="nama_sosial_media[]" /></td>
                      </tr>
                  </table>
               