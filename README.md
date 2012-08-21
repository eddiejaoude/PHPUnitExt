core-unit-tests
===============

Core tests required on any zf project, inc. line endings, debug code, docbloc validation

== Implemented Adapters ==
- line length (checks for line length > 80)


== Ideas ==
- conflicting files (checks for ====)
- debug code (checks for: var_dump,exit)
- bad code ( checks for: eval,goto, new Exception - should be custom exception)
- docblock

- line endings (checks for \r\n)
- excessive parameter list (> 3), suggest moving to array or DI
- method name that returns bool, should be isMethodName() or hasMethodName()
- no public attributes in a class, should be protected/private & have getters/setters

- method > 40 lines of code
- use (2 == $x) rather than ($x == 2)
