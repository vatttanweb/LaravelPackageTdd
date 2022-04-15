# LaravelPackageTdd
Laravel Package with TDD

In addition to API, I  provide routes. For use it, you should commit "return json" and uncommit "return view" in controller.

A user is checked with middleware. We assume that a user exists in db from the past.

You can Add Task and lable with all details in create task page.

You can edit Task and Lables in edit page.

Some important tests were written.

Some design patterns were implemented like Repository. But because of lacking time I couldn't implement some design patterns like "chain of work" for "if" clauses.

For email notification, you should set emails in codes. I use fake simple email like "test@test.com"
