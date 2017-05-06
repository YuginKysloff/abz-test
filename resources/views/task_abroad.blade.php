@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <h1 class="page-header">Test task</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        We have mysql database with table Vocabulary. Table has column word varchar(255).
                    </p>
                    <p>
                        Create page where user can select several items from Vocabulary table and get hash of them with one or several selected algorithms, e.g. md5, sha1, etc. Please provide at least 5 different algorithms. Result for each selected hash algorithm has to be displayed independently.
                        User should be able to save hashes to the database and access saved hashes in json format via http requests.
                    </p>
                    <p>
                        Provide cli task and schedule it to run each 11 minutes. Task should create xml files with information about user, their saved hashes, origin words and similar words from database. User information should include ip, browser, cookie and country of the user.
                    </p>
                    <p>
                        Page layout should be done with no css-frameworks. We expect you to demonstrate your skills of making things look good.
                    </p>
                    <p>
                        Please make sure you’ve provided good documentation for your solution in english with instruction on how to run and use it.
                    </p>
                    <p>
                        Additional points will be granted for providing unit/functional tests and code that follows SOLID principles.
                    </p>
                    <p>
                        As result of this task we expect to get link to git repository.
                    </p>
                    <a href="https://github.com/YuginKysloff/vocabulary" target="_blank">Source code</a>
                </div>
            </div>
        </div>
    </div>
@endsection