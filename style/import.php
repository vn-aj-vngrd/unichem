<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">


<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
  }

  body:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
    font-size: .9rem;
  }

  body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
    background-color: whitesmoke;
  }

  html {
    height: -webkit-fill-available;
  }

  main {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
  }

  /*product information CARD-IMAGE*/
  .img-thumbnail {
    width: 105.78;
    height: 102.54;
  }

  /*product information CARD-UPDATE-BUTTON*/
  .update {
    border: none;
    background-color: inherit;
    color: #1D92FF;

    font-size: 14px;
    cursor: pointer;
    display: inline-block;
  }

  /*product information CARD-DELETE-BUTTON*/
  .delete {
    border: none;
    background-color: inherit;
    color: #F64545;

    font-size: 14px;
    cursor: pointer;
    display: inline-block;
  }

  /*product information CARD-BODY-CUSTOM*/
  .white-box-container-prod-info {
    background-color: white;
    border: 1px solid #D5DBE4;
    padding: 20px;
    border-radius: 7px 7px 7px 7px;
    width: 489.66px;
    margin: 0 0 6px 0;
  }

  /* STRICTLY USE THIS CLASS TO ROUND EDGES */
  .round-edge {
    border-radius: 7px;
  }

  /* STRICTLY USE THIS CLASS FOR FORM CONTAINER */
  .form-box {
    background-color: white;
    padding: 20px;
    border: 1px solid #D5DBE4;
  }

  /* STRICTLY USE THIS CLASS FOR GENERIC WHITE CONTAINERS */
  .white-box-container {
    background-color: white;
    border: 1px solid #D5DBE4;
    padding: 20px;

  }

  .white-box-container-none {
    padding: 20px;
  }

  /* STRICTLY USE THIS CLASS FOR NAV CONTAINER */
  .nav-container {
    border-right: 1px solid #D5DBE4;
  }

  /* STRICTLY USE THIS CLASS FOR GENERIC CUSTOMER/SUPPLIER DETAIL CONTAINERS */
  .white-box-container-details-card-status {
    color: white;
    border: 1px solid #D5DBE4;
    padding: 5px 4px 2px 10px;
    width: 489.66px;
    border-radius: 7px 7px 0 0;
  }

  /* STRICTLY USE THIS CLASS FOR GENERIC CUSTOMER/SUPPLIER DETAIL CONTAINERS */
  .white-box-container-details-card-body {
    background-color: white;
    border: 1px solid #D5DBE4;
    padding: 20px;
    border-radius: 0 0 7px 7px;
    width: 489.66px;
    margin: 0 0 6px 0;
  }

  /* STRICTLY USE THIS CLASS FOR TO CONFIRM ORDER/REPLENISHMENT STATUS */
  .Awaiting-Approval {
    background-color: #898989;
  }

  /* STRICTLY USE THIS CLASS FOR TO SHIP ORDER/REPLENISHMENT STATUS */
  .Awaiting-Payment {
    background-color: #1D92FF;
  }

  /* STRICTLY USE THIS CLASS FOR TO RECEIVE ORDER/REPLENISHMENT STATUS */
  .Processing-Order {
    background-color: #9554FF;
  }

  /* STRICTLY USE THIS CLASS FOR COMPLETED ORDER/REPLENISHMENT STATUS */
  .Completed {
    background-color: #53C06B;
  }

  /* STRICTLY USE THIS CLASS FOR TO COMPLETE ORDER/REPLENISHMENT STATUS */
  .Cancelled {
    background-color: #ff2b2b;
  }

  .Awaiting-Shipment {
    background-color: #fd7e14;
  }

  .Awaiting-Pickup {
    background-color: #d63384;
  }

  .Manual-Verification-Required {
    background-color: #000;
  }

  .Refunded {
    background-color: #ffc107;
  }

  /* STRICTLY USE THIS CLASS FOR ORDER ROWS */
  .order-replenishment-header {
    background-color: whitesmoke;
    border: none;
    padding: 20px;
  }

  /* STRICTLY USE THIS CLASS FOR CONTAINER HEADER */
  .container-header {
    border: none;
    width: 941.44px;
    padding-left: 20px;
    margin: 0 0 5px 0;
  }

  .login-form {
    padding: 40px 20px 20px 20px;
  }

  .unichem-logo-login {
    height: 50px;
    width: 190px;
  }

  .notification-number {
    background-color: red;
    border-radius: 200px;
    padding: 1px 7px 3px 7px;
    color: white;
    font-size: .8rem;
  }

  .customer-supplier-information {
    width: 429.27px;
  }

  .supplier-customer-list {
    width: 473.61px;
  }

  .one-supplier-customer-list {
    height: 52.31px;
    width: 437.22px;
    margin: 0 0 5px 0;
  }

  .one-supplier-customer-list-long {
    height: 52.31px;
    width: 1214.69px;
    margin: 0 0 5px 0;
    padding: 20px;
  }

  .reports-left-data {
    width: 800px;
  }

  .reports-right-data {
    width: 150px;
    text-align: center;
  }

  .reports-right-data-long {
    width: 270px;
    text-align: center;
  }

  .one-order-replenishment-list {
    height: 52.31px;
    width: 961.44px;
    margin: 0 0 5px 0;
  }

  .father-container {
    padding: 30px;
  }

  .scroll-list {
    height: 650.43px;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0 20px 0 0;
  }

  .scroll-list-2 {
    height: 650.43px;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0 20px 0 0;
  }

  .scroll-list-3 {
    height: 750.43px;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0 20px 0 0;
  }

  .search-input {
    width: 477.22px;
  }

  .layout-column {
    margin-right: 50px;
  }

  .msg-container {
    margin-top: 10px;
    color: red;
  }

  .input-container {
    color: rgb(0, 0, 0);
    margin-top: 20px;
  }

  .nounderline {
    text-decoration: none !important
  }

  .table-fixed {
    border-collapse: separate;
    border-spacing: 0 5px;
    border-color: #E5E9F0;
    width: 950.22px;
    margin-top: -5px;
  }

  .thead-container {
    position: sticky;
    top: 0;
  }

  .thead-container tr th {
    font-weight: 400;
    padding: 12px;
  }

  .btn-delete {
    color: red;
    text-decoration: none;
  }

  .btn-delete:hover {
    color: red;
    text-decoration: underline;
  }

  .btn-preview {
    color: #0d6efd;
    text-decoration: none;
  }

  .btn-preview:hover {
    color: #0d6efd;
    text-decoration: underline;
  }

  .btn-update {
    color: #198754;
    text-decoration: none;
  }

  .btn-update:hover {
    color: #198754;
    text-decoration: underline;
  }

  .list-cell {
    width: 130px;
    height: 20px;

    overflow-x: hidden;
    overflow-y: hidden;
  }

  .list-cell-2 {
    width: 128px;
    height: 20px;

    overflow-x: hidden;
    overflow-y: hidden;
  }

  .form-create-order {
    width: 961.44px;
  }

  .create-new-button {
    display: flex;
    justify-content: end;
    width: 585px;
  }

  .list-name {
    width: 220px;
    height: 20px;
    overflow-x: hidden;
    overflow-y: hidden;
  }

  .empty-message {
    margin-top: 25px;
    padding-left: 20px;
    color: red;
    width: 1000px;
  }

  .add-more {
    margin-top: -2px;
  }

  .paste-new-forms {
    margin-top: -2px;
    margin-bottom: 7px;
  }

  .remove-btn {
    margin-top: 10px;
  }

  .reg-log-form {
    width: 400px;
    margin-top: 100px;
  }

  .fadediv {
    animation: fadein 0.6s;
    -moz-animation: fadein 0.6s;
    /* Firefox */
    -webkit-animation: fadein 0.6s;
    /* Safari and Chrome */
    -o-animation: fadein 0.6s;
    /* Opera */
  }

  @keyframes fadein {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @-moz-keyframes fadein {

    /* Firefox */
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @-webkit-keyframes fadein {

    /* Safari and Chrome */
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @-o-keyframes fadein {

    /* Opera */
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  .active-color {
    fill: white;
  }

  .custom-nav-pills {
    width: 1000px;
  }

  .empty-list {
    width: 437.22px;
  }

  .empty-information {
    width: 429.27px;
  }

  .long-chart {
    width: 1495px;
    height: 500px;
  }

  .modal-product {
    width: 1000px;
  }

  .chart-subheader {
    color: gray;
  }

  .nav-reports {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    background-color: white;
    padding: 9px 9px 9px 15px;
    width: 100%;
    color: black;
    border-radius: 7px;
    border: none;
  }

  .nav-reports:visited {
    background-color: #216eeb;
    color: white;
  }

  .dropdown-menu-reports {
    background-color: #f0f2f5;
    width: 245px;
    border: none;
  }

  .dropdown-item-reports {
    text-align: left;
    border-radius: 4px;
    background-color: #f0f2f5;
    width: 100%;
    border: none;
    text-decoration: none;
    color: black;
    font-size: .9rem;
    padding: 8px 10px 8px 17px;
  }

  .dropdown-item-reports:hover {
    background-color: #216eeb;
    color: white;
  }
</style>

<!-- SIDEBAR IMG HERE -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

  <symbol id="notif" viewBox="0 0 16 16">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
  </symbol>
  <symbol id="supplier" viewBox="0 0 16 16">
    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
  </symbol>
  <symbol id="customer" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
  </symbol>
  <symbol id="inventory" viewBox="0 0 16 16">
    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
  </symbol>
  <symbol id="order" viewBox="0 0 16 16">
    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
  </symbol>
  <symbol id="rep" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
    <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
  </symbol>
  <symbol id="employee" viewBox="0 0 16 16">
    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
  </symbol>
  <symbol id="sales" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
  </symbol>
</svg>