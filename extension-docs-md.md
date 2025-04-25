# PhotoBooth Extension Documentation

This document provides detailed information about the PhotoBooth extension code, its methods, and implementation details.

## Class Overview

The `PhotoBooth` class manages the entire photo booth workflow, from compositor setup to photo capture and combination.

```python
class PhotoBooth:
    def __init__(self, ownerComp):
        # Initialize properties and setup
```

## Initialization

During initialization, the extension:
1. Sets up instance variables
2. Creates the Photos directory if it doesn't exist
3. Initializes the compositor connections
4. Sets up the first character

## Core Methods

### Setup Methods

#### `setupCompositor()`
Establishes connections between key components in the network:
- Connects select2 (character) to compositor input 0
- Connects res1 (webcam) to compositor input 1
- Connects compositor to cache1 and displayScreen
- Initializes character selection

#### `debugCompositorConnections()`
Diagnostic method that prints detailed information about the current connections:
- Input connections to characterCompositor
- Output connections from characterCompositor
- Cache1 connections

### Character Management

#### `selectCharacter(index)`
Sets the character overlay based on the provided index:
- Updates select2 to point to the appropriate Lora character
- Ensures compositor connections are correct
- Forces components to cook/refresh
- Updates panel displays
- Returns success/failure status

#### `updateCharacterForPhoto()`
Helper method that selects character based on current photo count:
- Uses modulo operation to cycle through 4 characters
- Calls selectCharacter with appropriate index

### Panel Management

#### `updatePanelDisplays()`
Updates display components in various panels to show compositor output:
- Connects Step_3_Approve/in1 to compositor
- Connects Step_5_Upload/null1 to compositor
- Handles error conditions gracefully

### Workflow Methods

#### `Step1()` - Start Screen
- Resets counters and filenames
- Switches to the start panel

#### `Step2()` - Take Photo Screen
- Updates character based on photo count
- Updates UI to show current photo number
- Switches to photo taking panel
- Initializes and starts countdown timer

#### `Step3()` - Approve Screen
- Switches to approval panel
- Updates UI text based on current photo
- Updates button text ("Next Photo" or "Finish")

#### `RetakePhoto()`
- Returns to photo taking screen without incrementing counter

#### `ApprovePhoto()`
- Saves the current photo with timestamp filename
- Increments photo counter
- Proceeds to next photo or combination step

### Photo Processing

#### `CombinePhotos()`
- Switches to saving panel
- Generates filename for combined image
- Loads individual photos into PhotoCombiner
- Schedules SaveCombinedPhoto after delay

#### `SaveCombinedPhoto()`
- Saves the combined photo layout
- Connects PhotoCombiner output to SavePhoto
- Schedules transition to final screen

#### `Step5()` - Upload/Final Screen
- Updates display components with final image
- Updates combinedDisplay with file path
- Updates any components in mainDisplay

### Session Management

#### `Reset()`
- Resets photo counter and filename list
- Sets character to initial state

#### `RestartPhotoBooth()`
- Resets counters and state
- Refreshes character selection
- Forces components to refresh
- Returns to start screen

## Error Handling

The extension implements comprehensive error handling:
- Try/except blocks around critical operations
- Fallback behavior when components aren't found
- Detailed error messages for debugging
- Graceful operation when specific features aren't available

## Component Interaction

The extension interacts with several key components:
- **characterCompositor**: Blends webcam and character
- **select2**: Character selection component
- **cache1**: Caches composite image
- **displayScreen**: Reference point for panel displays
- **SavePhoto**: Component for saving images
- **Step_X_panels**: UI containers for workflow
- **PhotoCombiner**: Combines multiple photos

## Usage Notes

- Character paths are configured in `selectCharacter()` method
- The extension automatically creates the Photos directory
- The `RestartPhotoBooth()` method should be connected to the "Take New Photo" button
- Debug methods provide detailed diagnostics for troubleshooting
