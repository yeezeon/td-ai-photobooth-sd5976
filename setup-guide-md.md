# Installation and Setup Guide

This guide provides detailed instructions for installing and configuring the TouchDesigner Character Overlay PhotoBooth application.

## Prerequisites

Before beginning installation, ensure you have:

- TouchDesigner 2023.12230 or later installed
- A working webcam connected to your computer
- Four Lora character images with transparent backgrounds
- Basic familiarity with TouchDesigner interface

## Installation Steps

### 1. Project Setup

1. Clone or download the repository
2. Open TouchDesigner
3. Navigate to File → Open and select the `Photobooth.toe` file

### 2. Character Asset Setup

1. Create a folder structure: `/project1/Lora_interface/`
2. Prepare four character overlay images (PNG or TGA with alpha channel)
3. Place your character images in the Lora_interface directory with the following names:
   - `lora1`
   - `lora2`
   - `lora3`
   - `lora4`

### 3. Webcam Configuration

1. In TouchDesigner, locate the `videodevicein1` TOP in the main PhotoBooth network
2. Select the appropriate device from the 'Device' parameter dropdown
3. Adjust resolution settings if necessary
4. Test the webcam feed is working properly

### 4. Network Configuration

1. Verify the characterCompositor has the correct configuration:
   - Input 0: select2 (Character overlay)
   - Input 1: res1 (Video source)
   - Operation: Over
2. Create a Null TOP named `displayScreen` in the main PhotoBooth network
3. Connect displayScreen input to characterCompositor output
4. Verify cache1 is connected to characterCompositor

### 5. Panel Configuration

For each panel that needs to display the combined video:

1. Navigate to Step_2_Take_Photo, Step_3_Approve, and Step_5_Upload containers
2. Configure relevant display components to reference the displayScreen TOP

### 6. Extension Setup

1. Ensure the PhotoBooth extension is correctly loaded in the `/PhotoBooth` container
2. Verify the extension parameter is set to `('./PhotoBooth').module.PhotoBooth(me)`
3. Check the extension is promoted to COMP level

### 7. Restart Button Configuration

1. Navigate to the Step_5_Upload panel
2. Find the "Take New Photo" button component
3. Locate or create a Panel Execute DAT connected to the button
4. Edit the Panel Execute DAT to contain:
   ```python
   def onOffToOn(panelValue):
       op.PB.RestartPhotoBooth()
   
   def whileOn(panelValue):
       pass
   
   def onToOff(panelValue):
       pass
   
   def whileOff(panelValue):
       pass
   
   def valueChange(panelValue):
       pass
   ```

## Testing the Installation

1. Run the project
2. Click on the start button in the Step_1_Start panel
3. Verify the webcam feed appears with character overlay
4. Complete a full cycle of four photos
5. Confirm the photos are combined correctly
6. Test the restart functionality

## Troubleshooting

### Missing Character Overlays

If character overlays don't appear:

1. Run `op.PB.debugCompositorConnections()` in the TextPort
2. Verify character paths in the `selectCharacter` method match your actual file locations
3. Check the select2 TOP is correctly referencing the character files
4. Ensure the characterCompositor "Over" operation is enabled

### Display Issues in Panels

If panels don't show the combined image:

1. Ensure displayScreen is properly connected to characterCompositor
2. Verify each panel's display component is correctly referencing displayScreen
3. Try adding the Background TOP parameter to panel containers, referencing displayScreen

### Photo Saving Problems

If photos aren't being saved:

1. Check the Photos directory exists and has write permissions
2. Verify SavePhoto component is correctly configured
3. Ensure the cache1 connection to SavePhoto is working

## Customization

### Adjusting Character Cycling

To change how characters cycle through photos:

1. Locate the `updateCharacterForPhoto` method in the PhotoBooth extension
2. Modify the logic that determines which character to use for each photo

### Modifying Panel Layouts

To customize the UI panels:

1. Open the relevant panel container (Step_1_Start, Step_2_Take_Photo, etc.)
2. Edit components using the TouchDesigner interface
3. Update the associated methods in the PhotoBooth extension if necessary

### Changing the Photo Combination Layout

To adjust how the final photos are arranged:

1. Navigate to the PhotoCombiner network
2. Modify the arrangement of photo inputs
3. Update any associated parameters for spacing, borders, etc.
