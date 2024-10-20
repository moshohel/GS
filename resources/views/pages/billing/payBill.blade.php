@extends('layouts.layout')
@section('css')

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr Month Select Plugin CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

<style>
    /* Custom style for highlighting paid months */
    .flatpickr-monthSelect-month.disabled {
        background-color: #28a745 !important;
        color: white !important;
    }
</style>
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select Month for Pay</h4>
                        <form class="form-sample">
                            <p class="card-description">
                                Pay Bill
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <!-- Month Picker Input -->
                                        <label for="month-picker" class="col-sm-3 col-form-label">Select Month:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="month-picker" name="month" class="form-control"
                                                placeholder="Select a month">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- Flatpickr and Month Select Plugin Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Retrieve paid months from Laravel backend (passed from controller)
        const paidMonths = @json($paidMonths);  // Example: ['2024-01', '2024-03', '2024-06']

        // Disable paid months in Flatpickr format (array of Date objects)
        const disabledMonths = paidMonths.map(function(month) {
            // Parse the month to a Date object
            const parts = month.split('-');
            return new Date(parts[0], parts[1] - 1); // Convert YYYY-MM to JS Date
        });

        // Initialize Flatpickr with Month Select Plugin
        flatpickr("#month-picker", {
            dateFormat: "Y-m",  // Backend-friendly format (Year-Month)
            plugins: [new monthSelectPlugin({
                shorthand: true,  // Show short month names
                dateFormat: "Y-m",  // Submitted value (Year-Month)
                altFormat: "F Y",  // User-friendly format (Full month name and year)
            })],
            disable: disabledMonths,  // Disable paid months
            onReady: function(selectedDates, dateStr, instance) {
                // Add custom style to disabled months
                highlightPaidMonths(instance);
            },
            onMonthChange: function(selectedDates, dateStr, instance) {
                highlightPaidMonths(instance);
            },
            onYearChange: function(selectedDates, dateStr, instance) {
                highlightPaidMonths(instance);
            }
        });

        // Function to highlight paid months
        function highlightPaidMonths(instance) {
            document.querySelectorAll('.flatpickr-monthSelect-month').forEach(function(monthElement) {
                const monthYear = monthElement.getAttribute('aria-label');  // Get 'YYYY-MM' from element

                if (paidMonths.includes(monthYear)) {
                    // Disable the paid month and add green background
                    monthElement.classList.add('disabled');
                }
            });
        }
    });
</script>


@endsection