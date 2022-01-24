Laravel version: 8.79.0

The goal is to create a RESTful api for a simplified maritime application, using Laravel and PostgreSQL.
Through this challenge, you will be able to demonstrate how you break down and solve a problem, how you structure code and finally, some basic and intermediate SQL skills. You are also expected to make commits with verbose messages that reveal the committed code functionality.
The application consists of 3 basic entities:
1.	The base entity, the vessel (vessels db table). Each vessel has a name and an IMO number.
2.	The voyage (voyages db table). Each voyage is carried out by a single vessel. For every voyage we keep the vessel, the starting and ending date and time, the status and the revenues and expenses.
3.	The operational expenses (vessel_opex db table) of every vessel. We keep the expenses for every vessel for every day.

Implementation Guidelines

We want you to implement a REST API using the Laravel framework. The API will communicate with its clients using JSON objects (so no blade views are needed).
Please use the Service-Repository pattern. Place all the business logic in services and data access in repositories. When needed, format your responses using the Resource mechanism provided by the framework.

We recommend using the following DB structure, though you are free to modify it as you see fit.

1.	vessels
a.	id - autoincrement
b.	name - string
c.	IMO number - string
2.	voyages
a.	id - autoincrement
b.	vessel_id
c.	code - string
d.	start - datetime
e.	end - datetime
f.	status - string
g.	revenues - decimal(8,2)
h.	expenses - decimal(8,2)
i.	profit - decimal(8,2)
3.	vessel_opex
a.	id - autoincrement
b.	vessel_id
c.	date - date e.g. value ‘2021-01-01’ means that this record is for that specific date
d.	expenses - decimal(8,2)

What we expect you to create the following endpoints:
1.	No need for any Vessels endpoints. Save your time for the next steps.
2.	Voyages
a.	There are 3 options for the status of the voyage, ‘pending’, ‘ongoing’ and ‘submitted’.
b.	Newly created voyages need a vessel and a starting date. Status is automatically set to ‘pending’.
c.	Voyage code is auto generated on voyage creation using the following formula: <vessels.name>-<voyages.start>. Example: Titanic-2021-01-18
d.	Ending date, when entered, must be greater than the starting date.
e.	A vessel cannot have two ‘ongoing’ voyages at the same time. (voyage status check)
f.	A voyage can be submitted (status to ‘submitted’), only if ‘start’, ‘end’, ‘revenues’ and ‘expenses’ are not null.
g.	When submitting a voyage, you should calculate the profit field.
profit = revenues - expenses
h.	A voyage that is ‘submitted’ cannot be edited.
i.	Endpoints:
i.	No need to create a GET /voyages
ii.	POST /voyages - Create new voyage
Parameters: vessel_id, start, end, revenues, expenses
iii.	PUT /voyages/{voyage-id} - Edit a voyage
Parameters: start, end, revenues, expenses, status
profit should be auto calculated as stated in 2.e.
3.	Vessel Opex - A vessel cannot have two different opex amounts for the same date.
a.	No need for a GET request. Save your time for the next steps.
b.	POST /vessels/{vessel-id}/vessel-opex
Request body parameters: date, expenses
4.	GET /vessels/{vessel-id}/financial-report
This endpoint serves a report that combines voyage revenues, expenses as well as operational costs for all voyages of a vessel. We prefer an SQL implementation.
It calculates the following for every voyage:
a.	daily average profit = voyage profit / voyage duration
b.	net profit (profit including vessel expenses) = voyage profit - vessel expenses Be careful! Vessel expenses for the whole voyage duration must be taken into account.
c.	daily average net profit (average daily profit including vessel expenses) = profit including vessel expenses / voyage duration
The response format should resemble like the following:


[
	{
		"voyage_id": 8,
		"start": '2020-09-01 00:00:00',
		"end": '2020-12-31 23:59:59',
		"voyage_revenues": 1409304.26,
		"voyage_expenses": 750244.04,
		"voyage_profit": 659060.22,
		"voyage_profit_daily_average": 7242.42,
		"vessel_expenses_total": 234790.92,
		"net_profit": 424269.3,
		"net_profit_daily_average": 4662.3
	}
]

5.	***Bonus - Do this ONLY if you have everything else completed.
a.	When updating the name of a vessel, trigger an update for all voyages of the updated vessel.
b.	When updating the starting date of a voyage, auto update its code.

Good Luck!
