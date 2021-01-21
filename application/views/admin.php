<main id="main">
  <style>
    .lightRed {
      color: red !important
    }

    .lightGreen {
      color: green !important;
    }


    /* Style the tab */

    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }


    /* Style the buttons inside the tab */

    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }


    /* Change background color of buttons on hover */

    .tab button:hover {
      background-color: #ddd;
    }


    /* Create an active/current tablink class */

    .tab button.active {
      background-color: #ccc;
    }


    /* Style the tab content */

    .tabcontent {
      display: none;
      padding: 6px 12px;
      -webkit-animation: fadeEffect 1s;
      animation: fadeEffect 1s;
      border: 1px solid #ccc;
      border-top: none;
    }


    /* Fade in tabs */

    @-webkit-keyframes fadeEffect {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeEffect {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    #trading_table_wrapper {
      margin-top: -35px;
    }

    #shortTerm_table_wrapper {
      margin-top: -35px;
    }

    #longTerm_table_wrapper {
      margin-top: -35px;
    }

    .addButton {
      margin-right: 10px;
      margin-bottom: 10px;
      float: right;
    }
  </style>


  <section class="inner-page" style="padding: 150px 0">
    <div class="container">
      <div class="section-title" data-aos="zoom-out">
        <h2>Stocks</h2>
        <p>Admin</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary addButton" data-toggle="modal" data-target="#exampleModalCenter">
            Add Stock
          </button>
        </div>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Search stock</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-inline mb-4">
                <h3 class="mr-3">Category</h3>
                <select class="form-control" id="stock_category">
                  <option value="">Select Category</option>
                  <option value="1">Trading</option>
                  <option value="2">Short Term</option>
                  <option value="3">Long Term</option>
                </select>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'trading')" id="defaultOpen">Trading</button>
        <button class="tablinks" onclick="openTab(event, 'shortTerm')">Short Term</button>
        <button class="tablinks" onclick="openTab(event, 'longTerm')">Long Term</button>
      </div>
      <div id="trading" class="tabcontent">
        <table class="table table-striped " id="trading_table">
          <thead>
            <th></th>
            <th>Ticker</th>
            <th>Name</th>
            <th>Price</th>
            <th>% Change</th>
            <th>Price change</th>
          </thead>
          <tbody>

          </tbody>
        </table>

      </div>

      <div id="shortTerm" class="tabcontent">
        <table class="table table-striped " id="shortTerm_table">
          <thead>
            <th></th>
            <th>Ticker</th>
            <th>Name</th>
            <th>Price</th>
            <th>% Change</th>
            <th>Price change</th>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

      <div id="longTerm" class="tabcontent">
        <table class="table table-striped " id="longTerm_table">
          <thead>
            <th></th>
            <th>Ticker</th>
            <th>Name</th>
            <th>Price</th>
            <th>% Change</th>
            <th>Price change</th>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>



    </div>
  </section>

</main>