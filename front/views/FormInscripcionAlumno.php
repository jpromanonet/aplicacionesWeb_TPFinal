<article class="inscripciones">
            <div class="container">
                <hr>
                <h2>Sistema de Inscripciones a finales</h2>
                <hr><br>
                <div class="formularioInscripcion">
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                          <div class="col-md-3 mb-3">
                            <label for="validationCustom01"><p class="TitulosForm">Nombre</p></label>
                            <input type="text" class="form-control" id="validationCustom01" required>
                            <div class="valid-feedback"></div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom02"><p class="TitulosForm">Apellido</p></label>
                            <input type="text" class="form-control" id="validationCustom02" required>
                            <div class="valid-feedback"></div>
                          </div>
                          <div class="col-md-3 mb-3">
                                <label for="validationCustom03"><p class="TitulosForm">D.N.I</p></label>
                                <input type="number" class="form-control" id="validationCustom03" placeholder="Sin puntos ni coma" maxlength="8" required>
                                <div class="invalid-feedback"></div>
                              </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04"><p class="TitulosForm">Sede de cursada</p></label>
                                <select class="custom-select" id="validationCustom04" required>
                                  <option selected disabled value="">...</option>
                                  <option>Avellaneda</option>
                                  <option>Escobar</option>
                                  <option>Chivilcoy</option>
                                  <option>CABA</option>
                                  <option>Saladillo</option>
                                  <option>Hurlingham</option>
                                  <option>Cañuelas</option>
                                  <option>Laferrere</option>
                                  <option>Bridgestone</option>
                                </select>
                                <div class="invalid-feedback"></div>
                              </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationCustom05"><p class="TitulosForm">Carrera</p></label>
                            <select class="custom-select" id="validationCustom05" required>
                              <option selected disabled value="">...</option>
                              <option></option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                            </select>
                            <div class="invalid-feedback"></div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationCustom06"><p class="TitulosForm">Cuatrimestre</p></label>
                            <select class="custom-select" id="validationCustom06" required>
                              <option selected disabled value="">...</option>
                              <option></option>
                              <option>1* Cuatrimestre</option>
                              <option>2* Cuatrimestre</option>
                              <option>3* Cuatrimestre</option>
                              <option>4* Cuatrimestre</option>
                              <option>5* Cuatrimestre</option>
                            </select>
                            <div class="invalid-feedback"></div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationCustom07"><p class="TitulosForm">Materia</p></label>
                            <select class="custom-select" id="validationCustom07" required>
                              <option selected disabled value="">...</option>
                              <option></option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                              <option>...</option>
                            </select>
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                              Confirmo que los datos son correctos
                            </label>
                            <div class="invalid-feedback">
                              Debe tildar el recuadro.
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myInput">Inscribirse</button>
                      </form>

                      <div class="modal" tabindex="-1" id="myInput">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Inscripción exitosa</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Su inscripción se ha realizado correctamente</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </article>