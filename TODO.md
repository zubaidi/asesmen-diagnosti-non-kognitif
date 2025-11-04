# TODO: Update User Index Modal for Questionnaire Start

## Pending Tasks
- [x] Update the form tag in the modal to include action="{{ route('user.start') }}", method="POST", and add @csrf for CSRF protection.
- [x] Add name="nama_siswa" attribute to the nama input field.
- [x] Add name="nis" attribute to the nis input field.
- [x] Add a modal-footer with a submit button labeled "Mulai Kuisioner" to enable form submission.
- [x] Fix the Siswa model creation to include required 'kelas' field.

## Completed Tasks
- [x] Analyze the current modal structure and plan changes.
- [x] Get user approval for the plan.
- [x] Implement the form updates.
- [x] Add the submit button in the modal footer.
- [x] Identify and fix the database error by adding 'kelas' => 'X' in UserController.
- [x] Update Siswa model fillable array to include 'kelas'.
