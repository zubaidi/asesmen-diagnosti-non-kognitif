# TODO List for Adding Category Result Page

- [x] Create new method `categoryResult` in `UserController.php` to calculate and display category based on answers
- [x] Add new route for category result page in `routes/web.php`
- [x] Modify `submit` method in `UserController.php` to redirect to category result page instead of hasil page
- [x] Create new view `resources/views/user/category-result.blade.php` to display category result with auto-redirect after 3 seconds
- [x] Test the complete flow from questionnaire submission to home page redirect (Server running on http://127.0.0.1:8000)
