@extends('layout.main')

@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lihat Arsip<h1>
  </div>

  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center">
          <p class="fs-2 fw-bold">{{ $archive->title }}</p>
          <p class="fs-4">Kategori {{ $archive->category->name }} di Bidang {{ $archive->field->name }}</p>
        </div>
        <div class="d-flex justify-content-between">
          <p class="fs-5">Ditambahkan Pada : {{ date('jS M Y', $archive->created_at->timestamp) }}</p>
          <p class="fs-5">Terakhir diubah : {{ $archive->updated_at->diffForHumans() }}</p>
        </div><hr>
        <div class="d-flex justify-content-between mb-3">
          <a href="/" class="btn btn-info"><p><i class="bi bi-arrow-left"></i> Kembali</p></a>
          <a href="/dashboard/archives/{{ $archive->id }}/download" class="btn btn-primary"><p><i class="bi bi-download"></i> Unduh Dokumen</p></a>
        </div>
        
        @php
          $extension = pathinfo($archive->document, PATHINFO_EXTENSION)
        @endphp

        @if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp')
          <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/'.$archive->document) }}" class="img-fluid" alt="{{ $archive->title }}" style="border: 1px black solid">
          </div>
        @elseif ($extension == 'doc' || $extension == 'docx' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'ppt' || $extension == 'pptx')
          <p class="fw-bold"><span class="text-danger"> Gagal :</span> Format file Microsoft Office tidak didukung untuk ditampilkan, Silahkan convert kedalam format pdf atau unduh dokumen pada link diatas</p>
        @elseif ($extension == 'pdf')
          <div id="viewPDF"></div>
        @endif
      </div>
    </div>
  </div>

@endsection

@if ($extension == 'pdf')
  @push('addon-script')
    {{-- PDF Object --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>
    <script>
      if (PDFObject.supportsPDFs) {
        PDFObject.embed("{{ asset('storage/'. $archive->document) }}", "#viewPDF", {height: "800px"});
      } else {
        document.querySelector('#viewPDF').innerHTML = '<p class="text-center fw-bold"><span class="text-danger"> Gagal :</span> Browser yang digunakan tidak mendukung penampil PDF</p>'
      }
    </script>
  @endpush
@endif

