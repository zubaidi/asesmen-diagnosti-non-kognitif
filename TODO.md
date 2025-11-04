# TODO: Modify Questionnaire Flow

## Tasks
- [x] Update resources/views/user/index.blade.php: Remove kelas input, remove category cards, add "Mulai Kuisioner" button, form submits to new route.
- [x] Update app/Models/Siswa.php: Remove 'kelas' from fillable.
- [x] Update app/Http/Controllers/UserController.php: Add startQuestionnaire(Request $request) to create Siswa and redirect to questionnaire.
- [x] Update routes/web.php: Add POST route for start-questionnaire.
- [x] Update UserController questionnaire() to get all questions instead of by category.
- [x] Update resources/views/user/questionnaire.blade.php: Remove category references if any.
