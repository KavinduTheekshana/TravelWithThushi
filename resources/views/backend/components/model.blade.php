  <!-- Modal -->
  <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><strong id="modal-title"></strong> - <span id="modal-location"></span></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <img src="{{ asset('backend/assets/images/default.jpg') }}" class="model-image" />
                  <br>
                  <br>
                  <span id="active-badge" class="badge bg-success">Active</span>
                  <span id="popular-badge" class="badge bg-purple">Popular</span>
                  <span id="category-badge" class="badge bg-primary">Category</span>
                  <br>
                  <br>
           
                  <div class="modal-body p-0" id="modalBody"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
          </div>
      </div>
  </div>
