@echo off
PowerShell.exe -Command "choco list --local-only rabbitmq --id-only --exact | % { choco info $_ --exact --format=xml } | Select-Xml "//package/registryValues/add[@key='InstallLocation']" | % { $_.Node.value }"
pause
