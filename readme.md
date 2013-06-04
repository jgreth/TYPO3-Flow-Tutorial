TYPO3-Flow-Tutorial
===================

First steps on my way creating a TYPO3 Flow Tutorial.
This is more my notes than a public Project. Well, perhaps you'll find my notes usefull...
If it is so, drop me a line at github@greth.me and tell me whats usefull, or not, or... whatever... :)

This TYPO3 Flow Application is stored under /PathTo/MyFlowDirectory/Packages/Application/JPG.Usertest/

/PathTo/MyFlowDirectory/Configuration/Settings.yaml
-------------------
```yaml
#                                                                        #
# Configuration for the TYPO3 Flow Framework                             #
#                                                                        #
# This file contains additions to the base configuration for the TYPO3   #
# Flow Framework when it runs in Testing context.                        #
#                                                                        #
# Don't modify this file - instead put your own additions into the       #
# global Configuration directory and its sub directories.                #
#                                                                        #

TYPO3:
  Flow:
    persistence:
      backendOptions:
        driver: 'pdo_mysql'
        dbname: 'DB-NAME-HERE'				# DB name
        user: 'DB-USER-NAME-HERE'			# DB User
        password: 'DB-USER-PASSWORD-HERE'	# DB Password
        host: '127.0.0.1'					# DB Host

#    core:
#      phpBinaryPathAndFilename: '/usr/local/bin/php_cli'

    resource:
      publishing:
        fileSystem:
          mirrorMode: copy
		  
```

- Formatting hints: https://help.github.com/articles/github-flavored-markdown
