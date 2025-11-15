@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Outline')
@section('content')

    @include('admin.course.top-nav')

    <section class="content">
        @include('admin.course.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Outline Add') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.course.outline.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" id="title" class="form-control" name="title"
                                            placeholder="Enter Title" value="{{ old('title') }}" required>
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }} <spna class="text-danger">*</spna></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                        </div>
                                        <input type="text" id="subtitle" class="form-control" name="subtitle"
                                            placeholder="Enter Subtitle" value="{{ old('subtitle') }}" required>
                                    </div>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control summernote" name="description" rows="6"
                                        placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Units -->
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Units & Topics') }}</label>
                                    <div id="units-container"></div>
                                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-unit">
                                        Add Unit
                                    </button>
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        let unitCounter = 0;

        function addUnit(index) {
            $('#units-container').append(`
                <div class="unit-group border rounded p-3 mb-3" data-unit-index="${index}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6>Unit</h6>
                        <button type="button" class="btn btn-danger btn-sm remove-unit">Remove Unit</button>
                    </div>

                    <div class="form-group">
                        <label>Unit Title<span class="text-danger">*</span></label>
                        <input type="text" name="units[${index}][title]" class="form-control form-control-sm" placeholder="Unit Title" required>
                    </div>

                    <div class="topics-container"></div>
                    <button type="button" class="btn btn-outline-secondary btn-sm add-topic" data-unit-index="${index}">
                        Add Topic
                    </button>
                </div>
            `);

            addTopic(index);
            updateRemoveButtons();
        }

        function addTopic(unitIndex, topicIndex = null) {
            const unit = $(`#units-container .unit-group[data-unit-index="${unitIndex}"]`);
            if (!unit.length) return;
            
            const topicCount = unit.find('.topics-container .topic-group').length;
            const tIndex = topicIndex !== null ? topicIndex : topicCount;

            unit.find('.topics-container').append(`
                <div class="d-flex align-items-center mb-2 topic-group">
                    <input type="text" name="units[${unitIndex}][topics][${tIndex}][title]" class="form-control form-control-sm mr-2" placeholder="Topic Title" required>
                    <button type="button" class="btn btn-danger btn-sm remove-topic">×</button>
                </div>
            `);

            updateRemoveButtons();
        }

        function updateRemoveButtons() {
            const unitGroups = $('#units-container .unit-group');

            if (unitGroups.length <= 1) {
                unitGroups.find('.remove-unit').prop('disabled', true);
            } else {
                unitGroups.find('.remove-unit').prop('disabled', false);
            }

            unitGroups.each(function() {
                const topics = $(this).find('.topics-container .topic-group');
                if (topics.length <= 1) {
                    topics.find('.remove-topic').prop('disabled', true);
                } else {
                    topics.find('.remove-topic').prop('disabled', false);
                }
            });
        }

        addUnit(unitCounter);
        unitCounter++;

        $('#add-unit').click(function() {
            addUnit(unitCounter);
            unitCounter++;
        });

        $(document).on('click', '.remove-unit', function() {
            const totalUnits = $('#units-container .unit-group').length;
            if (totalUnits > 1) {
                $(this).closest('.unit-group').remove();
                updateRemoveButtons();
            } else {
                alert('At least one unit is required.');
            }
        });

        $(document).on('click', '.add-topic', function() {
            const uIndex = $(this).data('unit-index');
            addTopic(uIndex);
        });

        $(document).on('click', '.remove-topic', function() {
            const unit = $(this).closest('.unit-group');
            const topics = unit.find('.topics-container .topic-group');
            if (topics.length > 1) {
                $(this).closest('.topic-group').remove();
                updateRemoveButtons();
            } else {
                alert('Each unit must have at least one topic.');
            }
        });

        $('form').on('submit', function(e) {
            let valid = true;
            const unitGroups = $('#units-container .unit-group');

            if (unitGroups.length < 1) {
                alert('At least one unit is required.');
                valid = false;
            } else {
                unitGroups.each(function() {
                    const unitTitle = $(this).find('> .form-group input[name$="[title]"]').first().val() || '';
                    if (unitTitle.trim() === '') {
                        alert('Please enter a title for every unit.');
                        valid = false;
                        return false;
                    }

                    const topics = $(this).find('.topics-container .topic-group');
                    if (topics.length < 1) {
                        alert('Each unit must have at least one topic.');
                        valid = false;
                        return false;
                    }

                    let emptyTopic = false;
                    topics.each(function() {
                        const topicVal = $(this).find('input').val() || '';
                        if (topicVal.trim() === '') {
                            emptyTopic = true;
                            return false;
                        }
                    });

                    if (emptyTopic) {
                        alert('Please fill out all topic titles.');
                        valid = false;
                        return false;
                    }
                });
            }

            if (!valid) e.preventDefault();
        });

        updateRemoveButtons();
    });
</script>
@endsection
