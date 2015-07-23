Chain of responsibilities
=========================

Trading procedure has events:
*   procedure publication
*   applications registration is over
*   applications review protocol publication
*   procedure archive

Procedure Notifier gets an event and a procedure, which has fired that event.
Next Notifier must notify all interested users, such as:
*   participant's responsible users (applicants)
*   procedure organizer user (procedure's author)
*   protocol commission members
*   customer's head of department

So we create a chain of responsible user groups, and give it an event and a procedure.
Then each user group solves if it needed to notify it's users and if it does then do it.