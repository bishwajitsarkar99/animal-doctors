@if(auth()->user()->role ==1)
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="totalOrder_box">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg id="Layer_1" data-name="Layer 1" width="20px" height="20px" fill="rgba(134, 134, 134, 0.6)" viewBox="0 0 122.88 107.54"><title>trolley</title><path d="M3.93,7.86A3.93,3.93,0,0,1,3.93,0H14.15l.39,0A18.28,18.28,0,0,1,24.1,2.49a14.69,14.69,0,0,1,6.41,9.1c.32,1.41.66,2.82,1,4.23H119a3.92,3.92,0,0,1,3.93,3.92,4,4,0,0,1-.19,1.22L112.52,62.08a3.92,3.92,0,0,1-3.8,3H44.66c1.44,5.21,2.76,8,4.7,9.34,2.27,1.52,6.31,1.63,13,1.52h.07v0h45.17a3.93,3.93,0,1,1,0,7.86H62.46v0c-8.27.15-13.38-.09-17.46-2.84s-6.36-7.55-8.57-16.3l-13.51-51a7.19,7.19,0,0,0-3-4.49,10.8,10.8,0,0,0-5.51-1.3H3.93ZM96,88.34a9.6,9.6,0,1,1-9.6,9.6,9.6,9.6,0,0,1,9.6-9.6Zm-42.1,0a9.6,9.6,0,1,1-9.6,9.6,9.6,9.6,0,0,1,9.6-9.6ZM78,23.67V38h32.45l3.53-14.28Zm0,22.14V57.22h27.69l2.82-11.41ZM70.11,57.22V45.81H39.63q1.57,5.7,3,11.41Zm0-19.27V23.67H33.54c1.26,4.76,2.58,9.52,3.91,14.28Z"/></svg>
                Total-Orders
            </span>
            <div class="ring-div">
                <div class="total-order-loader">
                    <span class="total-number">70% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-order progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Pending Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="totalPending_box">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg id="Layer_1" data-name="Layer 1" width="20px" height="20px" fill="rgba(134, 134, 134, 0.6)" viewBox="0 0 97.18 122.88"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>cross-sell</title><path class="" d="M75.94,107.69a7.6,7.6,0,1,1-7.59,7.6,7.59,7.59,0,0,1,7.59-7.6ZM72.69,0c-1,0-1.63.4-1.69,1.33V6.22c0,3.19.08,4.74-2.09,7.45a12.18,12.18,0,0,1-1.59,1.63c-2.89,2.42-6.38,3.29-10.07,4.19C50.07,21.24,42.5,24,39.5,31.47c-1.71,4.24-1.38,9.71-1.38,14.28v2.81H32.76c-2.67,0-3.13.63-1.3,2.55l9.9,10.42c1.19,1.25,2,1.08,3.12-.12l9.86-10.29c1.82-1.79,1.3-2.6-1.21-2.57H46.84c-.27-18.12.9-17,18.17-22.08,5.35-1.86,9.1-4.69,11.56-8.3A19.31,19.31,0,0,0,80,6.45V3.09C80-.08,79.82,0,76.58,0ZM44.35,0c1,0,1.63.41,1.7,1.34V6.67c0,3.19-.09,4.74,2.08,7.45a11.17,11.17,0,0,0,1.6,1.63,13.59,13.59,0,0,0,2.32,1.58,36.21,36.21,0,0,0-7.2,3.1c-.63.37-1.25.77-1.85,1.19a18.67,18.67,0,0,1-2.52-3A19.25,19.25,0,0,1,37.07,6.9V3.54C37.07.38,37.22,0,40.46,0ZM73.22,25.92a15.54,15.54,0,0,1,4.33,6c1.7,4.23,1.38,9.7,1.38,14.28V49h5.35c2.67,0,3.13.63,1.31,2.55L75.69,62c-1.2,1.26-2,1.08-3.13-.12L62.71,51.59C60.89,49.79,61.4,49,63.91,49H70.2c.2-13.21-.37-16.21-7.38-18.82l3.55-1,.15-.05h0a31.31,31.31,0,0,0,6.7-3.2ZM91.07,54.05a3.1,3.1,0,0,1,6,1.48L89,88.28a3.1,3.1,0,0,1-3,2.36H35.71c1,3.27,2,5.13,3.33,6,1.79,1.21,5,1.3,10.31,1.2H85.12a3.11,3.11,0,1,1,0,6.21H49.39c-6.53.12-10.57-.07-13.8-2.24s-5-6-6.78-12.89L18.13,48.62a5.67,5.67,0,0,0-2.35-3.56,8.61,8.61,0,0,0-4.35-1H3.11a3.11,3.11,0,1,1,0-6.21H11.5a14.6,14.6,0,0,1,7.56,1.95A11.66,11.66,0,0,1,24.13,47c1.72,7.4,3.8,14.8,5.86,22.2H55.45v-12l2.88-3a11,11,0,0,0,.81.9l2.52,2.63v11.5H87.32l3.75-15.14Zm-57,30.41a3,3,0,0,1,.42,0H55.45v-9H31.71Q33,79.93,34.1,84.46Zm27.56,0h21.9l2.23-9H61.66v9Zm-19,23.26a7.6,7.6,0,1,1-7.59,7.6,7.6,7.6,0,0,1,7.59-7.6Z"/></svg>
                Pending
            </span>
            <div class="ring-div">
                <div class="total-pending-loader">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-pending progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Complete Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="completeOrder">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 434.91"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="rgba(134, 134, 134, 0.6)" fill-rule="nonzero" d="M15.31 43.96c-8.25,0 -15.31,-7.06 -15.31,-15.7 0,-8.24 7.06,-15.3 15.31,-15.3l21.19 0c0.39,0 1.18,0 1.57,0 14.13,0.39 26.69,3.14 37.29,9.8 20.54,13.02 24.19,31.61 29.44,52.6l170.15 0c-2.03,9.26 -3.1,18.87 -3.1,28.74l0.01 1.88 -158.43 0 34.94 131.49 247.67 0 0.06 -0.22c3.04,0.21 6.11,0.32 9.21,0.32 7.72,0 15.29,-0.66 22.65,-1.92l-5.23 21.06c-1.57,7.06 -7.85,11.77 -14.91,11.77l-251.21 0c5.49,20.41 10.99,31.4 18.45,36.51 9.02,5.88 24.73,6.27 51.02,5.88l0.4 0 177.41 0c8.64,0 15.31,7.07 15.31,15.31 0,8.64 -7.07,15.31 -15.31,15.31l-177.41 0c-32.58,0.39 -52.6,-0.4 -68.7,-10.99 -16.48,-10.99 -25.11,-29.83 -33.75,-63.98l-52.6 -199.01c0,-0.39 0,-0.39 -0.39,-0.78 -2.35,-8.64 -6.28,-14.52 -11.77,-17.66 -5.5,-3.54 -12.96,-5.11 -21.59,-5.11 -0.4,0 -0.79,0 -1.18,0l-21.19 0zm228.96 96.91c0,-4.84 4.78,-8.76 10.67,-8.76 5.9,0 10.68,3.92 10.68,8.76l0 59.2c0,4.84 -4.78,8.76 -10.68,8.76 -5.89,0 -10.67,-3.92 -10.67,-8.76l0 -59.2zm-63.94 0c0,-4.84 4.78,-8.76 10.67,-8.76 5.9,0 10.68,3.92 10.68,8.76l0 59.2c0,4.84 -4.78,8.76 -10.68,8.76 -5.89,0 -10.67,-3.92 -10.67,-8.76l0 -59.2zm177.64 218.67c20.8,0 37.68,16.88 37.68,37.69 0,20.8 -16.88,37.68 -37.68,37.68 -20.8,0 -37.68,-16.88 -37.68,-37.68 0,-20.81 16.88,-37.69 37.68,-37.69zm-165.25 0c20.8,0 37.68,16.88 37.68,37.69 0,20.8 -16.88,37.68 -37.68,37.68 -20.8,0 -37.68,-16.88 -37.68,-37.68 0,-20.81 16.88,-37.69 37.68,-37.69z"/><path fill="#00A912" fill-rule="nonzero" d="M405.31 0c29.46,0 56.13,11.95 75.44,31.25 19.31,19.31 31.25,45.98 31.25,75.44 0,29.45 -11.94,56.13 -31.25,75.43 -19.31,19.31 -45.98,31.26 -75.44,31.26 -29.45,0 -56.13,-11.95 -75.44,-31.26 -19.3,-19.3 -31.25,-45.98 -31.25,-75.43 0,-29.46 11.95,-56.13 31.25,-75.44 19.31,-19.3 45.99,-31.25 75.44,-31.25z"/><path fill="white" d="M372.38 86.95l19.89 18.79 43.22 -43.86c3.9,-3.95 6.34,-7.13 11.14,-2.18l15.59 15.97c5.12,5.06 4.86,8.03 0.03,12.74l-61.08 60.03c-10.18,9.98 -8.41,10.59 -18.73,0.35l-36.3 -36.1c-2.15,-2.32 -1.92,-4.68 0.44,-7l18.09 -18.77c2.74,-2.88 4.92,-2.63 7.71,0.03z"/></g></svg>
                Complete
            </span>
            <div class="ring-div">
                <div class="total-complete-loader">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Reject Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="rejectOrder">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg width="20px" height="18px" fill="rgba(134, 134, 134, 0.6)" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.84 122.88" style="enable-background:new 0 0 122.84 122.88" xml:space="preserve"><g><path d="M81.49,4.71c0-2.62,2.58-4.71,5.77-4.71c3.2,0,5.77,2.13,5.77,4.71V25.4c0,2.62-2.58,4.71-5.77,4.71 c-3.2,0-5.77-2.13-5.77-4.71V4.71L81.49,4.71z M51.43,99.74c-1.24,1.33-3.33,1.42-4.71,0.18c-1.33-1.24-1.42-3.33-0.18-4.71 l10.35-11.06l-11.06-10.3c-1.33-1.24-1.42-3.33-0.18-4.71c1.24-1.33,3.33-1.42,4.71-0.18l11.06,10.35l10.3-11.06 c1.24-1.33,3.33-1.42,4.71-0.18c1.33,1.24,1.42,3.33,0.18,4.71L66.26,83.84l11.06,10.35c1.33,1.24,1.42,3.33,0.18,4.71 c-1.24,1.33-3.33,1.42-4.71,0.18L61.73,88.73L51.38,99.79L51.43,99.74L51.43,99.74z M29.53,4.71c0-2.62,2.58-4.71,5.77-4.71 c3.2,0,5.77,2.13,5.77,4.71V25.4c0,2.62-2.58,4.71-5.77,4.71c-3.2,0-5.77-2.13-5.77-4.71V4.71L29.53,4.71z M6.35,45.3H116.4V21.45 c0-0.8-0.31-1.55-0.84-2.04c-0.53-0.53-1.24-0.84-2.04-0.84h-10.53c-1.78,0-3.2-1.42-3.2-3.2c0-1.78,1.42-3.2,3.2-3.2h10.53 c2.58,0,4.88,1.07,6.57,2.75c1.69,1.69,2.75,4.04,2.75,6.57v92.06c0,2.58-1.07,4.88-2.75,6.57c-1.69,1.69-4.04,2.75-6.57,2.75 l-104.18,0c-2.58,0-4.88-1.07-6.57-2.75C1.07,118.44,0,116.08,0,113.55V21.49c0-2.58,1.07-4.88,2.75-6.57 c1.69-1.69,4.04-2.75,6.57-2.75l11.28,0c1.78,0,3.2,1.42,3.2,3.2c0,1.78-1.42,3.2-3.2,3.2H9.33c-0.8,0-1.55,0.31-2.09,0.84 c-0.53,0.53-0.84,1.24-0.84,2.09v23.85L6.35,45.3L6.35,45.3z M116.4,51.69H6.35v61.82c0,0.8,0.31,1.55,0.84,2.09 c0.53,0.53,1.24,0.84,2.09,0.84h104.18c0.8,0,1.55-0.31,2.09-0.84c0.53-0.53,0.84-1.24,0.84-2.09V51.69L116.4,51.69z M50.36,18.52 c-1.78,0-3.2-1.42-3.2-3.2c0-1.78,1.42-3.2,3.2-3.2h21.49c1.78,0,3.2,1.42,3.2,3.2c0,1.78-1.42,3.2-3.2,3.2H50.36L50.36,18.52z"/></g></svg>
                Reject
            </span>
            <div class="ring-div">
                <div class="total-reject-loader">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Sales ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="totalSales">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg id="Layer_1" width="20px" height="20px" fill="rgba(134, 134, 134, 0.6)" data-name="Layer 1" viewBox="0 0 122.88 104.01"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>stocks</title><path class="" d="M0,13.86a6,6,0,1,1,12.06,0V91.94H116.85a6,6,0,0,1,0,12.07H0V13.86ZM101.9,7.15l-3-3.88a2,2,0,0,1-.43-1.89C99-.19,100.8,0,102.09.05c3.65.26,11.72.84,13.6.91a2,2,0,0,1,2,2.49c-.38,1.9-1.59,10.55-2.22,14-.22,1.2-.58,2.77-2.11,2.88a2,2,0,0,1-1.72-.87l-3-3.88-1.23-1.56L92.39,25.41v.26a9.06,9.06,0,0,1-18.12,0c0-.2,0-.4,0-.6L63.78,17.48A9.05,9.05,0,0,1,52.85,17l-10.2,7.26A9.2,9.2,0,0,1,43,26.6a9,9,0,1,1-5.39-8.29l12-8.54A9.06,9.06,0,0,1,67.67,10c0,.2,0,.4,0,.59l10.51,7.6a9.06,9.06,0,0,1,10.55.15L102.48,7.89l-.58-.74Zm-.09,23.38H114.3a1.31,1.31,0,0,1,1.31,1.3V80.37a1.32,1.32,0,0,1-1.31,1.31H101.81a1.31,1.31,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM77.09,47.16H89.58a1.31,1.31,0,0,1,1.31,1.31v31.9a1.32,1.32,0,0,1-1.31,1.31H77.09a1.31,1.31,0,0,1-1.31-1.31V48.47a1.31,1.31,0,0,1,1.31-1.31ZM52.36,30.53h12.5a1.3,1.3,0,0,1,1.3,1.3V80.37a1.32,1.32,0,0,1-1.3,1.31H52.36a1.32,1.32,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM27.64,49.84H40.13a1.31,1.31,0,0,1,1.31,1.31V80.37a1.32,1.32,0,0,1-1.31,1.31H27.64a1.31,1.31,0,0,1-1.31-1.31V51.15a1.31,1.31,0,0,1,1.31-1.31Z"/></svg>
                Total Sales
            </span>
            <div class="ring-div">
                <div class="total-sales-loader">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Expenses ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus skeleton" id="totalExpenses">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left">
                <svg width="20px" height="20px" fill="rgba(134, 134, 134, 0.6)" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 87.86"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>income-growth</title><path class="" d="M82.64,77.72c0,5-7.73,9-17.25,9s-17.25-4.05-17.25-9A5.28,5.28,0,0,1,48.93,75c2.19,3.68,8.73,6.34,16.46,6.34,5.1,0,13.59-1.51,16.46-6.34a5.31,5.31,0,0,1,.79,2.71Zm-40.36-.94c0,6.11-9.47,11.08-21.14,11.08S0,82.89,0,76.78a6.39,6.39,0,0,1,1-3.32c2.69,4.5,10.7,7.77,20.17,7.77,6.25,0,16.65-1.85,20.17-7.77a6.42,6.42,0,0,1,1,3.32Zm.12-11.54c0,6.11-9.47,11.08-21.14,11.08S.12,71.35.12,65.24a6.45,6.45,0,0,1,1-3.32c2.69,4.5,10.7,7.77,20.17,7.77,6.25,0,16.65-1.85,20.17-7.77a6.51,6.51,0,0,1,1,3.32ZM28.89,36.47l-.25,2.75-10.37-.9a9.36,9.36,0,0,1,1.78,3.73l-2.5-.22a8,8,0,0,0-1.12-2.45,5.09,5.09,0,0,0-2.16-1.93l.2-2.23,14.42,1.25Zm-7.31-4.31c9.44,0,17.05,3.1,17.05,6.82s-7.78,6.81-17.37,6.81S3.89,42.73,3.89,39s7.53-6.75,16.91-6.82Zm-.07-2.26c11.55,0,20.89,5,20.89,11.08S32.93,52.07,21.26,52.07.12,47.1.12,41,9.46,29.94,21,29.9ZM42.4,53.33c0,6.11-9.47,11.08-21.14,11.08S.12,59.44.12,53.33A6.26,6.26,0,0,1,1,50.15c2.61,4.56,10.68,7.9,20.25,7.9,6.26,0,16.8-1.88,20.24-7.9a6.36,6.36,0,0,1,.9,3.18ZM44,0a3.7,3.7,0,0,1,.84,7.35l-6.63.78L62.47,25.68,72.8,16.42A3.67,3.67,0,0,1,77.16,16l35.57,21.63a3.68,3.68,0,1,1-3.81,6.3L75.68,23.73,65.17,33.16a3.69,3.69,0,0,1-4.61.24L33.19,13.63,34.06,21a3.69,3.69,0,0,1-7.34.84L24.87,6.17l0-.19A3.7,3.7,0,0,1,28.1,1.89L44,0Zm67.87,63.6-.2,2.24-8.47-.73a7.65,7.65,0,0,1,1.45,3l-2-.18a6.58,6.58,0,0,0-.92-2,4.18,4.18,0,0,0-1.76-1.57l.16-1.82,11.77,1Zm-5.29-3.5c7.39.19,13.24,2.6,13.24,5.55s-6.35,5.56-14.18,5.56-14.18-2.5-14.18-5.56,6-5.42,13.49-5.56c.55,0,1.09,0,1.63,0Zm0-1.85c9.11.24,16.36,4.2,16.36,9,0,5-7.73,9-17.25,9s-17.25-4.06-17.25-9,7.3-8.81,16.46-9c.56,0,1.11,0,1.68,0Zm15.63,16.9a5.22,5.22,0,0,1,.73,2.6c0,5-7.73,9-17.25,9s-17.25-4-17.25-9a5.09,5.09,0,0,1,.73-2.6c2.13,3.73,8.71,6.45,16.52,6.45,5.16,0,13.73-1.56,16.52-6.45ZM71.62,53.47l-.2,2.24L63,55A7.76,7.76,0,0,1,64.4,58l-2-.18a6.58,6.58,0,0,0-.92-2,4.12,4.12,0,0,0-1.75-1.58l.16-1.81,11.77,1ZM66.31,50c7.4.19,13.25,2.61,13.25,5.55s-6.35,5.56-14.17,5.56-14.18-2.5-14.18-5.56,5.95-5.4,13.42-5.55Zm-.07-1.84c9.12.23,16.4,4.19,16.4,9,0,5-7.73,9-17.25,9s-17.25-4-17.25-9,7.33-8.84,16.51-9c.53,0,1,0,1.59,0Zm16.4,19.49c0,5-7.73,9-17.25,9s-17.25-4.06-17.25-9A5,5,0,0,1,48.87,65c2.12,3.72,8.71,6.45,16.52,6.45,5.11,0,13.72-1.54,16.52-6.45a5.24,5.24,0,0,1,.73,2.59Z"/></svg>
                Expenses
            </span>
            <div class="ring-div">
                <div class="total-expenses-loader">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title mt-1 ps-3">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-expenses progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">

            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role ==2)
<div class="row">
    <div class="col-xl-2 col-md-6">
        <!-- =========== Total Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalOrder_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order font-effect-shadow-multiple">
                            {{__('translate._Orders (Monthly)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" id="order_counter" data-val="200">0000</span><span class="number symbl pe-1" id="order_counter2">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-plus fa-2x fa-beat" id="ordericon" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Pending Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalPending_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order ps-1">
                            {{__('translate._Pending (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-day fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Complete Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="completeOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order">
                            {{__('translate.Complete (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-check fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Reject Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="rejectOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order ps-1">
                            {{__('translate._Rejected (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-xmark fa-2x text-gray-300 fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->role ==3)
<div class="row">
    <div class="col-xl-2 col-md-6">
        <!-- =========== Total Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalOrder_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order font-effect-shadow-multiple">
                            {{__('translate._Orders (Monthly)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" id="order_counter" data-val="200">0000</span><span class="number symbl pe-1" id="order_counter2">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-plus fa-2x fa-beat" id="ordericon" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Pending Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalPending_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order ps-1">
                            {{__('translate._Pending (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-day fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Complete Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="completeOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order">
                            {{__('translate.Complete (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-check fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Reject Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="rejectOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order ps-1">
                            {{__('translate._Rejected (Orders)')}}
                        </div>
                        <div class="cu_amu tg"><span class="num ps-1 number" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-xmark fa-2x text-gray-300 fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif