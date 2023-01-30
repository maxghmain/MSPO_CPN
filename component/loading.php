<style>
  .bg-loader {
    position: fixed;
    height: 100%;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    align-items: center;
    justify-content: center;
    /*border: 1px solid red;*/
    display: flex;
    z-index: 9999;
    backdrop-filter: blur(5px);
  }

  .loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    /* Safari */
    animation: spin 2s linear infinite;
  }

  /* Safari */
  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>
<div class="bg-loader" id="bg-loader" style="display: none;">
  <div class="loader"></div>
</div>