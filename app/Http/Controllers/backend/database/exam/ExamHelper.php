<?php

namespace CEF\Http\Controllers\backend\database\exam;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExamHelper extends Controller
{
    public static function create($project_name)
    {
        Storage::append("$project_name/database/db.sql",
            "CREATE TABLE questions (
  question_id int(11) NOT NULL,
  test_id int(11) NOT NULL,
  question text NOT NULL,
  image varchar(200) NOT NULL,
  option_a text NOT NULL,
  option_b text NOT NULL,
  option_c text NOT NULL,
  option_d text NOT NULL,
  answer varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE questions_desc (
  question_id int(11) NOT NULL,
  test_id int(11) NOT NULL,
  question varchar(400) NOT NULL,
  image varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE subjects (
  subject_id int(11) NOT NULL,
  subject varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE test (
  test_id int(11) NOT NULL,
  subject varchar(50) NOT NULL,
  test_name varchar(50) NOT NULL,
  sdatetime datetime NOT NULL,
  edatetime datetime NOT NULL,
  test_duration int(11) NOT NULL,
  attempts int(11) NOT NULL,
  yes_no varchar(3) NOT NULL,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE test_result (
  result_id int(11) NOT NULL,
  test_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  right_ans int(11) NOT NULL,
  wrong_ans int(11) NOT NULL,
  no_attempt int(11) NOT NULL,
  score float NOT NULL,
  time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE test_result_desc (
  result_id int(11) NOT NULL,
  question_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  test_id int(11) NOT NULL,
  answer text NOT NULL,
  marks int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `questions`
--
ALTER TABLE questions
  ADD PRIMARY KEY (question_id);

--
-- Indexes for table `questions_desc`
--
ALTER TABLE questions_desc
  ADD PRIMARY KEY (question_id);

--
-- Indexes for table `subjects`
--
ALTER TABLE subjects
  ADD PRIMARY KEY (subject_id);

--
-- Indexes for table `test`
--
ALTER TABLE test
  ADD PRIMARY KEY (test_id);

--
-- Indexes for table `test_result`
--
ALTER TABLE test_result
  ADD PRIMARY KEY (result_id);

  
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE questions
  MODIFY question_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions_desc`
--
ALTER TABLE questions_desc
  MODIFY question_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE subjects
  MODIFY subject_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE test
  MODIFY test_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE test_result
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
  
  INSERT INTO menu (id,name,link) VALUES (2,'Exam','AdminHomeExam.php');
  INSERT INTO menu (id,name,link) VALUES (3,'Exam','studentHomeExam.php');
  INSERT INTO menu (id,name,link) VALUES (3,'Result','studentProfile.php');
            
");
    }
}
