core-unit-tests
===============

Core tests required on any zf project, inc. line endings, debug code, docbloc validation

== Implemented Adapters ==
- line endings (checks for \r\n)


== Ideas ==
- conflicting files (checks for ===)
- debug code (checks for: var_dump,exit)
- bad code ( checks for: eval,goto, new Exception - should be custom exception)
- docblock

- line length (checks for line length >70)
- excessive parameter list (> 3), suggest moving to DI
- method name that returns bool, should be isX() or hasX()
- no public class attributes

- dead code
- copied code
- method > 40 lines of code
- use (2 == $x) rather than ($x == 2)
