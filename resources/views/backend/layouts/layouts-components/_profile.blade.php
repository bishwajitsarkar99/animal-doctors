<!-- Modal -->
<div class="modal fade" id="profile_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header text-fade-animation"style="border-bottom: double white;background-image: linear-gradient(to bottom, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%);">
        @if(auth()->user()->role ==0)
          <h6 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
          </h6>
        @elseif(auth()->user()->role ==1)
        <h5 class="modal-title admin_title ps-1 pe-1" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==2)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==3)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==5)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==6)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==7)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <svg width="30px" height="30px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg>
          {{Auth::user()->name}} Profile
        </h5>
        @endif
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="row profile-heading">
          <div class="flex justify-center sm:items-center sm:justify-between mb-3" id="pro_image">
            <span class="image-box">
              <img class="profile" src="/storage/image/user-image/{{auth()->user()->image}}" alt="profile-image">
            </span>
          </div>
        </div>
        <div class="page-responsive">
          <div class="row">
            <div class="col-xl-12 first_box">
              <div class="company-section" id="company_info">
                <i class="fa-solid fa-layer-group" style="color:#0A5EDB;">‌</i>
                <span>Company Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <label id="pro_com_name" class="mt-1" for="company_name">Company : {{setting('company_name')}}</label><br>
                <label id="com_address" class="address mt-1" for="address">Address : {{setting('company_address')}}</label><br>
                <label id="com_address" class="address mt-1" for="address">Email : .............</label><br>
                <label id="com_address" class="address mt-1" for="address">Web : .............</label><br>
                <label id="com_address" class="address mt-1" for="address">Contract : .............</label><br>
              </div>
            </div>
            <div class="col-xl-12 second_box">
              <div class="company-section" id="personal_info">
                <i class="fa-solid fa-layer-group" style="color:#0A5EDB;">‌</i>
                <span>Personal Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info">
                  <label class="mt-1" for="Contract-number">Contract :</label>
                  <span class="mt-1">{{Auth::user()->contract_number}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mail-address">Credentials-Email :</label>
                  <span class="mt-1">{{Auth::user()->email}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="login-mail-address">Login-Email :</label>
                  <span class="mt-1">{{Auth::user()->login_email}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Mailing-Email :</label>
                  <span class="mt-1">{{Auth::user()->mailing_email}}</span> <br>
                </span>
              </div>
            </div>
            <div class="col-xl-12 third_box">
              <div class="company-section" id="branch_information">
                <i class="fa-solid fa-layer-group" style="color:#0A5EDB;">‌</i>
                <span>Branch Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info">
                  <label class="mt-1" for="Contract-number">Branch-ID :</label>
                  <span class="mt-1">{{Auth::user()->branch_id}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mail-address">Branch-Type :</label>
                  <span class="mt-1">{{Auth::user()->branch_type}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="login-mail-address">Branch-Name :</label>
                  <span class="mt-1">{{Auth::user()->branch_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Division-Name :</label>
                  <span class="mt-1">{{Auth::user()->division_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">District-Name :</label>
                  <span class="mt-1">{{Auth::user()->district_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Upazila/Thana :</label>
                  <span class="mt-1">{{Auth::user()->upazila_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">City-Name :</label>
                  <span class="mt-1">{{Auth::user()->town_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Location :</label>
                  <span class="mt-1">{{Auth::user()->location}}</span> <br>
                </span>
              </div>
            </div>
            <div class="col-xl-12 fourth_box">
              <div class="company-section" id="role_info">
                <i class="fa-solid fa-layer-group" style="color:#0A5EDB;">‌</i>
                <span>Role Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Role-Name :</label>
                  <span class="mt-1">{{Auth::user()->roles->name}}</span> <br>
                </span>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer" style="background-image:linear-gradient(to bottom, rgb(221 216 216 / 47%) 0%, rgba(0, 0, 0, 0.05) 100%);"> </div>
    </div>
  </div>
</div>