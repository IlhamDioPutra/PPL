@section('script')
    <script>
        const datatable = $('#dataTables').DataTable()
        $('.dataTables_filter').hide()
        const filtersearch = document.querySelector('#search');
        filtersearch.addEventListener('keyup', (e) => {
            datatable.search(e.target.value).draw();
        })

        $('.dataTables_length select').addClass('pe-4 ps-4 pb-1 pt-1')
        $('.dataTables_length').addClass('me-4')
        const svgkiri = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black"/>
                        </svg>`
        const svgkanan = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"/>
                          </svg>>`
        $('i.previous').html(svgkiri)
        $('i.next').html(svgkanan)
    </script>
@endsection
