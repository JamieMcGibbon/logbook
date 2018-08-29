<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 10px;">

                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Flight</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                            <form>
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class="form-group">
                        <label>Aircraft:</label>
                        <input type="text" class="form-control" name="aircraft" placeholder="ex. Piper PA-28-161">
                    </div>
                    <div class="form-group">
                        <label>To/From:</label>
                        <input type="text" class="form-control" name="aircraft" placeholder="ex. KBOS to KBOS">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Day:</label>
                                <input type="text" class="form-control" name="hours_day">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Night:</label>
                                <input type="text" class="form-control" name="hours_night">
                            </div>
                        </div>
                    </div>

                    <!-- Row 2  -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Instrument:</label>
                                <input type="text" class="form-control" name="hours_day">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Simulated Instrument:</label>
                                <input type="text" class="form-control" name="hours_night">
                            </div>
                        </div>
                    </div>
                    <!-- /Row 2 -->


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type:</label>
                        <select class="form-control" id="type">
                            <option>PIC</option>
                            <option>SIC</option>
                            <option>Dual</option>
                            <option>Instructor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Notes:</label>
                        <input type="text" class="form-control" name="notes">
                    </div>

                    <button class="btn btn-primary form_margin">Submit Changes</button>

                </form>
        </div>
    </div>
    </div>