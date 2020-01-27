# Plugins for Attach

A plugin is a self-contained piece of code that get the following pieces of information from FIONA:

 - a DICOM file from the selected study
 - the uploaded files

The plugin is expected to create a new DICOM file as a new series in that study. A report picture and
the data as a gzipp-ed private tag are expected to contain the context. The FIONA will attach that data
to the study in PACS.
